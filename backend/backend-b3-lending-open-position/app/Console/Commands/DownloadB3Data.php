<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asset;
use App\Models\UpToDateTrack;
use App\Jobs\SalvaAsset;

class DownloadB3Data extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:b3data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dates = [];
        $date = date('Y-m-d');
        $last_updated = UpToDateTrack::find(1)->date;
        $date_difference = date_create($date)->diff(date_create($last_updated))->days;

        if(date_diff(date_create($date), date_create($last_updated))->format('%a') == 0) {
            return $this->info(string: 'Data already up to date.');
        } 

        for($i = 1; $i <= $date_difference; $i++)
        {
            array_push($dates, date('Y-m-d', strtotime($last_updated . ' + ' . $i . ' days')));
        }

        for($i=0; $i<count($dates); $i++){
            $dayOfTheWeek = date('l', strtotime($dates[$i]));
            if($dayOfTheWeek == 'Saturday' || $dayOfTheWeek == 'Sunday'){
                continue;
            }
            SalvaAsset::dispatch($dates[$i]);
        }

        UpToDateTrack::find(1)->update(['date' => $dates[count($dates)-1]]);
    }
}
