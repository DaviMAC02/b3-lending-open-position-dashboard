<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route to get the assets information from B3 in a specific date range
Route::get('/getAsset/{asset}/{inicialDate}/{finalDate}', 'App\Http\Controllers\AssetController@index');

// Route to get the assets information from B3 in a specific date
Route::get('/getAsset/{asset}/{date}', 'App\Http\Controllers\AssetController@getAssetByDate');

// Route to get the assets name from B3
Route::get('/getAsset/all', 'App\Http\Controllers\AssetController@indexAllAssets');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
