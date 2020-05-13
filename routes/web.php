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


// Route Rooms
Route::get('/ruangan', 'RoomController@index')->name('room.index');
Route::get('/ruangan/tambah', 'RoomController@create')->name('room.create');
Route::post('/ruangan/tambah', 'RoomController@store')->name('room.store');
Route::get('/ruangan/{id}/ubah', 'RoomController@edit')->name('room.edit');
Route::put('/ruangan/{id}', 'RoomController@update')->name('room.update');
Route::delete('/ruangan/{id}', 'RoomController@destroy')->name('room.delete');


// Route Classes
Route::get('kelas', 'ClassController@index')->name('class.index');
Route::get('/kelas/tambah', 'ClassController@create')->name('class.create');
Route::post('/kelas/tambah', 'ClassController@store')->name('class.store');
Route::get('/kelas/{id}/ubah', 'ClassController@edit')->name('class.edit');
Route::put('/kelas/{id}', 'ClassController@update')->name('class.update');
Route::delete('/kelas/{id}', 'ClassController@destroy')->name('class.delete');

// students
Route::get('/siswa', 'StudentController@index')->name('student.index');
Route::get('/siswa/tambah', 'StudentController@create')->name('student.create');
Route::get('/siswa/{id}', 'StudentController@show')->name('student.detail');
Route::post('/siswa/tambah', 'StudentController@store')->name('student.store');
Route::get('/siswa/{id}/edit', 'StudentController@edit')->name('student.edit');
Route::put('/siswa/{id}', 'StudentController@update')->name('student.update');
Route::delete('/siswa/{id}', 'StudentController@destroy')->name('student.delete');

// Route Items
Route::get('barang', 'ItemController@index')->name('item.index');
Route::get('barang/tambah', 'ItemController@create')->name('item.create');
Route::post('barang/tambah', 'ItemController@store')->name('item.store');
Route::get('/barang/{id}/edit', 'ItemController@edit')->name('item.edit');
Route::put('/barang/{id}', 'ItemController@update')->name('item.update');
Route::get('barang/{id}/details', 'ItemController@show')->name('item.detail');
Route::delete('barang/{id}', 'ItemController@destroy')->name('item.delete');


// Route::get('/barang/{id}/edit', 'ItemController@edit')->name('item_edit');
Route::get('/pindah/{id}/pindah/ruangan', 'ItemController@changeroom')->name('item.change.room');
// Route::get('/pindah/{id}/update', 'ItemController@changeupdate')->name('item.change.get');
Route::put('pindah/{id}/update', 'ItemController@changeupdate')->name('item.change.update');


// Route Borrow
Route::get('pinjam', 'BorrowController@index')->name('borrow.index');
Route::get('pinjam/tambah', 'BorrowController@create')->name('borrow.create');
Route::post('pinjam/tambah', 'BorrowController@store')->name('borrow.store');




// Route API
Route::get('api/siswa', 'ApiController@getStudent')->name('api.student');
Route::get('api/unit', 'ApiController@getUnit')->name('api.unit');
