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

// Route API
Route::get('siswa/{nisn}', 'ApiController@getStudent')->name('api.student');
Route::get('unit/{numberUnit}', 'ApiController@getUnit')->name('api.unit');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
