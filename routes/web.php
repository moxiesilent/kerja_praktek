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

Route::get('/prestasis','PrestasiController@index');
Route::resource('prestasis','PrestasiController');

Route::get('/mahasiswas','MahasiswaController@index');
Route::resource('mahasiswas','MahasiswaController');

Route::get('/dosens','DosenController@index');
Route::resource('dosens','DosenController');

Route::get('/matakuliahs','MatakuliahController@index');
Route::resource('matakuliahs','MatakuliahController');

Route::get('/ceklayout',function(){
    return view('layouts.argon');
});