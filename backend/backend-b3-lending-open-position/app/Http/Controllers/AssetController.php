<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{
    public function index($asset, $inicialDate, $finalDate)
    {
        $assets = Asset::where('Asst', $asset)
            ->where('date', '>=', $inicialDate)
            ->where('date', '<=', $finalDate)
            ->get();

        return response()->json($assets);
    }

    public function indexAllAssets()
    {
        $assets_info = Asset::where('date', '=', '2022-11-24')->get();
        $assets = [];
        for($i = 0; $i < count($assets_info); $i++){
            $assets[$i] = $assets_info[$i]->Asst;
        }

        return response()->json($assets);

    }

    public function getAssetByDate($asset, $date)
    {
        $asset = Asset::where('Asst', $asset)
            ->where('date', '=', $date)
            ->get();

        return response()->json($asset);
    }
    
}
