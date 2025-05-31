<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Location API Routes
Route::get('/provinces', 'App\Http\Controllers\Api\LocationController@getProvinces');
Route::get('/provinces/{id}/regencies', 'App\Http\Controllers\Api\LocationController@getRegencies');
Route::get('/regencies/{id}/districts', 'App\Http\Controllers\Api\LocationController@getDistricts');
Route::get('/districts/{id}/villages', 'App\Http\Controllers\Api\LocationController@getVillages');
