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
Route::get('/ruangan/{id}/ubah', 'RoomController@edit')->name('room.edit');
Route::put('/ruangan/{id}', 'RoomController@update')->name('room.update');
Route::DELETE('/ruangan/{id}', 'RoomController@destroy')->name('room.delete');

// Route::resource('ruangan', 'RoomController');


// Route Class
Route::get('kelas', 'ClassController@index')->name('class.index');
Route::get('/kelas/tambah', 'ClassController@create')->name('class.create');
Route::post('/kelas/tambah', 'ClassController@store')->name('class.store');
Route::get('/kelas/{id}/ubah', 'ClassController@edit')->name('class.edit');
Route::put('/kelas/{id}', 'ClassController@update')->name('class.update');
Route::DELETE('/kelas/{id}', 'ClassController@destroy')->name('class.delete');

//
Route::get('siswa', 'StudentController@index')->name('student.index');
Route::get('siswa/{id}', 'StudentController@show')->name('student.detail');
