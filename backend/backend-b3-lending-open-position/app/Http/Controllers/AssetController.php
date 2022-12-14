<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{
    public function index($asset, $inicialDate, $finalDate)
    {
        // Get the asset data from the database in the specific date range
        $assets = Asset::where('Asst', $asset)
            ->where('date', '>=', $inicialDate)
            ->where('date', '<=', $finalDate)
            ->get();

        return response()->json($assets);
    }

    public function indexAllAssets()
    {
        // Get all assets names from the database
        $assets_info = Asset::where('date', '=', '2022-11-24')->get();
        $assets = [];
        for($i = 0; $i < count($assets_info); $i++){
            $assets[$i] = $assets_info[$i]->Asst;
        }

        return response()->json($assets);

    }

    // Get the asset data from the database in the specific date
    public function getAssetByDate($asset, $date)
    {
        $asset = Asset::where('Asst', $asset)
            ->where('date', '=', $date)
            ->get();

        return response()->json($asset);
    }
    
}
