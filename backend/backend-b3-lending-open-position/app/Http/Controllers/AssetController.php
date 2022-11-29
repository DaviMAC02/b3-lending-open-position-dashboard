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
    
}
