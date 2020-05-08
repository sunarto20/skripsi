<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.main');
})->name('dashboard');


// Route Room
Route::get('/ruangan', 'RoomController@index')->name('room.index');
Route::get('/ruangan/tambah', 'RoomController@create')->name('room.create');
Route::post('/ruangan/tambah', 'RoomController@store')->name('room.store');
Route::get('/ruangan/{id}/edit', 'RoomController@edit')->name('room.edit');
Route::put('/ruangan/{id}', 'RoomController@update')->name('room.update');
Route::DELETE('/ruangan/{id}', 'RoomController@destroy')->name('room.delete');

// Route::resource('ruangan', 'RoomController');
