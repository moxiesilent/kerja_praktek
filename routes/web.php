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

Route::get('/', 'ArtikelController@artikelkeindex');
Route::view('/sambutan', 'sambutan');
Route::view('/visimisi', 'visimisi');
Route::view('/tentangkami', 'tentang');
Route::view('/struktur', 'struktur');
Route::get('/profildosen', 'DosenController@profilDosen');
Route::get('/profildosen/{id}', 'DosenController@getDosen');
Route::view('/kurikulum', 'kurikulum');
Route::get('/jurnal', 'JurnalController@index');
Route::resource('jurnals', 'JurnalController');
Route::get('/penelitian', 'PenelitianController@index');
Route::get('/prestasimahasiswa','PrestasiController@prestasikewebprofile');
Route::resource('artikels','ArtikelController');
Route::get('artikelback/hapus/{id}','ArtikelController@hapusArtikel');


Route::get('/matakuliahDosen', 'LogindosenController@matakuliahDosen');
Route::get('/matakuliahDosen/{id}', 'LogindosenController@getPertemuan');
Route::get('/matakuliahDosen/pertemuan/{id}', 'LogindosenController@getMateri');
Route::get('/matakuliahDosen/tugas/{id}', 'LogindosenController@getTugas');
Route::get('/matakuliahDosen/tugas/gantiStatus/{id}', 'LogindosenController@gantiStatus');
Route::post('/matakuliahDosen/tugas/hapus','TugasController@hapusTugas');

Route::resource('materis','MateriController');
Route::resource('tugass','TugasController');
Route::resource('mengambils','MengambilController');
Route::post('/mengambil/hapus','MengambilController@hapusMahasiswa');

Route::get('/loginmahasiswa/{id}','LoginmahasiswaController@getPertemuan');
Route::get('/loginmahasiswa/materi/{id}','LoginmahasiswaController@getMateri');
Route::get('/loginmahasiswa/tugas/{id}','LoginmahasiswaController@getTugas');
Route::post('/loginmahasiswa/tugas/hapus','PengumpulanController@hapusTugas');
Route::resource('pengumpulans','PengumpulanController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pertemuan','PertemuanController@index');
Route::resource('pertemuans','PertemuanController');

Route::get('/profil','ProfilController@index');
Route::resource('profils','ProfilController');

Route::get('/prestasi','PrestasiController@index')->name('prestasi');
Route::resource('prestasis','PrestasiController');

Route::get('/mahasiswa','MahasiswaController@index');
Route::resource('mahasiswas','MahasiswaController');

Route::get('/dosen','DosenController@index');
Route::resource('dosens','DosenController');

Route::get('/galeri','GaleriController@index');
Route::resource('galeris','GaleriController');

Route::get('/matakuliah','MatakuliahController@index');
Route::resource('matakuliahs','MatakuliahController');

Route::get('/semester','SemesterController@index')->name('semester');
Route::resource('semesters','SemesterController');

Route::get('/mengajar','MengajarController@index');
Route::get('/mengajar/detail/{id}','MengajarController@detailMengajar');
Route::resource('mengajars','MengajarController');

Route::get('/artikelback','ArtikelController@backEndIndex');

Route::get('/dashboard','DashboardController@index');
Route::get('/loginmahasiswa','LoginmahasiswaController@index');
// Route::get('/logindosen','LogindosenController@index');

Route::get('/resetpassword/{id}','DosenController@resetPassword');
Route::get('/dosen/detail/{id}','DosenController@detailDosen');

Route::get('/ceklayout',function(){
    return view('layouts.argon');
});