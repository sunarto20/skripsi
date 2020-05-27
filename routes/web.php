<?php

// namespace App\Http\Middleware\Role;

use Illuminate\Support\Facades\Auth;
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

// Route Login
Route::get('login', 'AuthController@login')->name('login');
Route::post('/login/masuk', 'AuthController@postLogin')->name('post.login');
Route::get('logout', 'AuthController@logout')->name('logout');



Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {

    // Route Root
    Route::get('/', function () {
        return view('welcome');
    });

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
    // Route::get('/siswa/detail', 'StudentController@getDetailStudentByRole')->name('student.getDetail');
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
    Route::get('pinjam/{id}/detail', 'BorrowController@show')->name('borrow.detail');
    Route::delete('pinjam/{id}', 'BorrowController@destroy')->name('borrow.destroy');

    // Route Return
    Route::get('kembali', 'ReturnController@index')->name('return.index');
    Route::put('kembali/{id}', 'ReturnController@update')->name('return.update');


    // Route Exit
    Route::get('keluar', 'ExitItemController@index')->name('exit.index');
    Route::get('keluar/tambah', 'ExitItemController@create')->name('exit.create');
    Route::post('keluar/tambah', 'ExitItemController@store')->name('exit.store');

    // Route Report
    Route::get('laporan/item', 'ReportController@reportItemIndex')->name('report.item.index');
    Route::post('laporan/item/cetak', 'ReportController@reportItem')->name('report.item');
    Route::get('laporan/item/cetak', 'ReportController@reportItem')->name('report.item');
    Route::get('laporan/barang-keluar', 'ReportController@reportExitIndex')->name('report.exit.index');
    Route::post('laporan/barang-keluar/cetak', 'ReportController@reportExit')->name('report.exit');
    Route::get('laporan/barang-keluar/cetak', 'ReportController@reportExit')->name('report.exit');
    Route::get('laporan/peminjaman-barang', 'ReportController@reportBorrowIndex')->name('report.borrow.index');
    Route::post('laporan/peminjaman-barang/cetak', 'ReportController@reportBorrow')->name('report.borrow');
    Route::get('laporan/peminjaman-barang/cetak', 'ReportController@reportBorrow')->name('report.borrow');
    // Route::post('laporan/item', 'ReportController@reportItem')->name('report.siswwa');
    // tes
    Route::get('tes', 'UnitCOntroller@tesPdf');
});

Route::group(['middleware' => ['auth', 'CheckRole:siswa']], function () {
    Route::get('detail', 'StudentController@getDetailStudentByRole')->name('student.getDetail');
});
Route::group(['middleware' => ['auth', 'CheckRole:siswa,admin']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
});
