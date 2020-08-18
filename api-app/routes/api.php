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
Route::get('/models/kanaPrefixHasModel/{test?}', 'MotobikeController@kanaPrefixHasModel');
Route::get('/models/namePrefixHasModel/{test?}', 'MotobikeController@namePrefixHasModel');
Route::get('/models/displacementHasModel/{test?}', 'MotobikeController@displacementHasModel');
Route::get('/models/markerHasModel/{test?}', 'MotobikeController@markerHasModel');

/**
 * Filter data
 */
Route::get('/models/filterMotobikeList/{kana?}/{name?}/{disp?}/{maker?}', 'MotobikeController@filterMotobikeList');