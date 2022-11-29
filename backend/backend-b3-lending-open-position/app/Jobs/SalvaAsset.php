<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Asset;


class SalvaAsset implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $date;
    public $tries = 3;
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(2);
        $url = 'https://arquivos.b3.com.br/api/download/requestname?fileName=LendingOpenPosition&date='.$this->date.'&recaptchaToken=';
        $options = array(
            'https'=>array(
            'method'=>"GET",
            'request_fulluri' => true,
            'header'=>
            "Cookie: foo=bar\r\n" .  
            "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36\r\n".
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image8\r\n".
            "Accept-Encoding: gzip, deflate, sdch, br\r\n".
            "Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.6,en;q=0.4\r\n".
            "Cache-Control: max-age=0\r\n".
            "Connection: keep-alive\r\n".
            "Host: arquivos.b3.com.br\r\n".
            "Upgrade-Insecure-Requests: 1\r\n"
            )
        );
        $context = stream_context_create($options);
        $token_return = file_get_contents($url, false, $context);
        $token_json = json_decode($token_return);
        $token = $token_json->token;
        $new_url = 'https://arquivos.b3.com.br/api/download/?token='.$token;
        $file = file_get_contents($new_url, false, $context);
        $json_file = explode(';', $file);
        for ($i=0; $i < count($json_file); $i++) { 
            $json_file[$i] = explode('\r\n', $json_file[$i]);
        }
    
        $assets_array = [];
        $asset_array = [];
        for ($i=0; $i < count($json_file); $i++) { 
            if ($i%7 == 0 && $i != 0) {
                $splited_asset_date = str_replace(array("\n", "\r"), ',', $json_file[$i][0]);
                $splited_asset_date = explode(',,', $splited_asset_date);
                array_push($assets_array, $asset_array);
                $asset_array = [];
                array_push($asset_array, $splited_asset_date[0]);
                array_push($asset_array, $splited_asset_date[1]);
                continue;
            }
            array_push($asset_array, $json_file[$i][0]);
        }
    
        for ($i=1; $i < count($assets_array); $i++) { 
            $asset = new Asset();
            $asset->RptDt = $assets_array[$i][0];
            $asset->date = $assets_array[$i][1];
            $asset->TckrSymb = $assets_array[$i][2];
            $asset->ISIN = $assets_array[$i][3];
            $asset->Asst = $assets_array[$i][4];
            $asset->BalQty = $assets_array[$i][5];
            $asset->TradAvrgPricTradAvrgPric = $assets_array[$i][6];
            $asset->PricFctr = $assets_array[$i][7];
            $asset->save();
        }
    }
}
