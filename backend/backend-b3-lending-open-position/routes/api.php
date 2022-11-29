<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/getAsset/{asset}/{inicialDate}/{finalDate}', 'App\Http\Controllers\AssetController@index');
Route::get('/getAsset/all', 'App\Http\Controllers\AssetController@indexAllAssets');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
