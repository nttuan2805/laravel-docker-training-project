<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/modelMakers', 'MstModelMakerController@index');
Route::get('/modelMakers/{id}', 'MstModelMakerController@show');
/**
 * Get Header Data
 */
Route::get('/models/kanaPrefixHeader', 'MotobikeController@kanaPrefixHeader');
Route::get('/models/namePrefixHeader', 'MotobikeController@namePrefixHeader');
Route::get('/models/displacementHeader', 'MotobikeController@displacementHeader');
Route::get('/models/markerHeader', 'MotobikeController@markerHeader');

/**
 * Get Header Data has Model
 */
Route::get('/models/kanaPrefixHasModel', 'MotobikeController@kanaPrefixHasModel');
Route::get('/models/namePrefixHasModel', 'MotobikeController@namePrefixHasModel');
Route::get('/models/displacementHasModel', 'MotobikeController@displacementHasModel');
Route::get('/models/markerHasModel', 'MotobikeController@markerHasModel');

/**
 * Filter data
 */
Route::get('/models/filterMotobikeList/{kana?}/{name?}/{disp?}/{maker?}', 'MotobikeController@filterMotobikeList');