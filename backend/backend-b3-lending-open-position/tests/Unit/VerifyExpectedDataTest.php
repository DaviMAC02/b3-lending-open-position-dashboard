<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\UpToDateTrackController;

class VerifyExpectedDataTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    //Test a set of expected assets values against the database values
    public function test_expected_asset()
    {
        
        $asset_test_dataset = [
            ["JPMC", "592346,79", "2022-12-12", "JPMC34", "BRJPMCBDR009", "10644", "68,0968799", "1"], 
            ["AAPL", "30284901,25", "2022-12-05", "AAPL34", "BRAAPLBDR004", "790813", "39,0682148", "1"],
            ["AGRO", "203099998,94","2022-12-05", "AGRO3", "BRAGROACNOR7", "2401984", "27,7125225", "1"],
            ["BACW", "5856153,3", "2022-11-10", "BACW39", "BRBACWBDR007", "73802", "42,3019262", "1"],
            ["ANIM", "11046218,66", "2022-11-22", "ANIM3", "BRANIMACNOR6", "9202103", "5,6867922", "1"]
        ];

        for($i = 0; $i < count($asset_test_dataset); $i++)
        {

            $asset_controller = new AssetController();
            $asset_test = $asset_controller->getAssetByDate($asset_test_dataset[$i][0], $asset_test_dataset[$i][2]);
            $asset_test = json_decode($asset_test->content(), true);


            $this->assertEquals($asset_test_dataset[$i][0], $asset_test[0]['Asst']);
            $this->assertEquals($asset_test_dataset[$i][1], $asset_test[0]['RptDt']);
            $this->assertEquals($asset_test_dataset[$i][2], $asset_test[0]['date']);
            $this->assertEquals($asset_test_dataset[$i][3], $asset_test[0]['TckrSymb']);
            $this->assertEquals($asset_test_dataset[$i][4], $asset_test[0]['ISIN']);
            $this->assertEquals($asset_test_dataset[$i][5], $asset_test[0]['BalQty']);
            $this->assertEquals($asset_test_dataset[$i][6], $asset_test[0]['TradAvrgPric']);
        }
    }

    // Test if the system returns 404 error in case of an invalid asset
    public function test_invalid_asset()
    {
        $asset_controller = new AssetController();
        $asset_test = $asset_controller->getAssetByDate("fake_asset", "2022-11-22");
        $asset_test = json_decode($asset_test->content(), true);

        $this->assertEquals([], $asset_test);
    }

    // Test if the system is up to date (Note: this test will fail if download command has not been executed)
    public function test_up_to_date()
    {
        $up_to_date_controller = new UpToDateTrackController();
        $up_to_date_test = $up_to_date_controller->index(1);
        $up_to_date_test = json_decode($up_to_date_test->content(), true);

        $this->assertEquals(date('Y-m-d'), $up_to_date_test[0]['date']);
    }
}
