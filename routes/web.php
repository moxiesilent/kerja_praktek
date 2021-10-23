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

Route::get('/', 'DosenController@dosenkelanding');
Route::view('/sambutan', 'sambutan');
Route::view('/visimisi', 'visimisi');
Route::view('/tentangkami', 'tentang');
Route::view('/struktur', 'struktur');
Route::get('/profildosen', 'DosenController@profilDosen');
Route::view('/kurikulum', 'kurikulum');
Route::get('/jurnal', 'JurnalController@index');
Route::resource('jurnals', 'JurnalController');
Route::get('/penelitian', 'PenelitianController@index');

Route::get('/matakuliahDosen', 'LogindosenController@matakuliahDosen');
Route::get('/matakuliahDosen/{id}', 'LogindosenController@getPertemuan');
Route::get('/matakuliahDosen/pertemuan/{id}', 'LogindosenController@getMateri');
Route::get('/matakuliahDosen/tugas/{id}', 'LogindosenController@getTugas');
Route::resource('materis','MateriController');
Route::resource('tugass','TugasController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pertemuan','PertemuanController@index');
Route::resource('pertemuans','PertemuanController');

Route::get('/prestasi','PrestasiController@index')->name('prestasi');
Route::resource('prestasis','PrestasiController');

Route::get('/mahasiswa','MahasiswaController@index');
Route::resource('mahasiswas','MahasiswaController');

Route::get('/dosen','DosenController@index');
Route::resource('dosens','DosenController');

Route::get('/matakuliah','MatakuliahController@index');
Route::resource('matakuliahs','MatakuliahController');

Route::get('/semester','SemesterController@index')->name('semester');
Route::resource('semesters','SemesterController');

Route::get('/mengajar','MengajarController@index');
Route::resource('mengajars','MengajarController');

Route::get('/dashboard','DashboardController@index');
Route::get('/loginmahasiswa','LoginmahasiswaController@index');
Route::get('/logindosen','LogindosenController@index');

Route::get('/ceklayout',function(){
    return view('layouts.argon');
});