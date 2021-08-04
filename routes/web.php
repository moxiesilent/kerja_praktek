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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/prestasi','PrestasiController@index');
Route::resource('prestasis','PrestasiController');

Route::get('/mahasiswa','MahasiswaController@index');
Route::resource('mahasiswas','MahasiswaController');

Route::get('/dosen','DosenController@index');
Route::resource('dosens','DosenController');

Route::get('/matakuliah','MatakuliahController@index');
Route::resource('matakuliahs','MatakuliahController');

Route::post('/prestasi/getEditForm','PrestasiController@getEditForm')->name('prestasi.getEditForm');
Route::post('/dosen/getEditForm','DosenController@getEditForm')->name('dosen.getEditForm');
Route::post('/mahasiswa/getEditForm','MahasiswaController@getEditForm')->name('mahasiswa.getEditForm');
Route::post('/matakuliah/getEditForm','MatakuliahController@getEditForm')->name('matakuliah.getEditForm');

Route::get('/ceklayout',function(){
    return view('layouts.argon');
});