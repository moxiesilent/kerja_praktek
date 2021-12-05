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
Route::get('/sambutan', 'ProfilController@frontEndSambutan');
Route::get('/visimisi', 'ProfilController@frontEndVisi');
Route::view('/tentangkami', 'tentang');
Route::view('/struktur', 'struktur');
Route::get('/profildosen', 'DosenController@profilDosen');
Route::get('/profildosen/{id}', 'DosenController@getDosen');
Route::view('/kurikulum', 'kurikulum');
Route::get('/jurnal','JurnalController@frontEndIndex');
Route::get('/jurnalback', 'JurnalController@index')->middleware('auth');
Route::resource('jurnals', 'JurnalController');
Route::get('/penelitian', 'PenelitianController@frontEndIndex');
Route::get('/penelitianback', 'PenelitianController@index')->middleware('auth');
Route::get('/prestasimahasiswa','PrestasiController@prestasikewebprofile');

Route::get('/artikel','ArtikelController@frontEndIndex');
Route::resource('artikels','ArtikelController');

Route::get('artikelback/hapus/{id}','ArtikelController@hapusArtikel');
Route::get('/galeriruangan','GaleriController@indexRoom');
Route::get('/galerikegiatan','GaleriController@indexAct');
Route::get('/galerifasilitas','GaleriController@indexFac');

Route::get('artikelback/hapus/{id}','ArtikelController@hapusArtikel')->middleware('auth');

Route::get('/user','DashboardController@daftarUser')->middleware('auth');

Route::get('/matakuliahDosen', 'LogindosenController@matakuliahDosen')->middleware('auth');
Route::get('/matakuliahDosen/{id}', 'LogindosenController@getPertemuan');
Route::get('/matakuliahDosen/pertemuan/{id}', 'LogindosenController@getMateri')->middleware('auth');
Route::get('/matakuliahDosen/tugas/{id}', 'LogindosenController@getTugas')->middleware('auth');
Route::get('/matakuliahDosen/tugas/gantiStatus/{id}', 'LogindosenController@gantiStatus')->middleware('auth');
Route::post('/matakuliahDosen/tugas/hapus','TugasController@hapusTugas')->middleware('auth');

Route::resource('materis','MateriController')->middleware('auth');
Route::resource('tugass','TugasController')->middleware('auth');
Route::resource('mengambils','MengambilController')->middleware('auth');
Route::post('/mengambil/hapus','MengambilController@hapusMahasiswa')->middleware('auth');

Route::get('/loginmahasiswa/{id}','LoginmahasiswaController@getPertemuan')->middleware('auth');
Route::get('/loginmahasiswa/materi/{id}','LoginmahasiswaController@getMateri')->middleware('auth');
Route::get('/loginmahasiswa/tugas/{id}','LoginmahasiswaController@getTugas')->middleware('auth');
Route::post('/loginmahasiswa/tugas/hapus','PengumpulanController@hapusTugas')->middleware('auth');
Route::resource('pengumpulans','PengumpulanController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pertemuan','PertemuanController@index')->middleware('auth');
Route::resource('pertemuans','PertemuanController')->middleware('auth');

Route::get('/profil','ProfilController@index')->middleware('auth');
Route::resource('profils','ProfilController')->middleware('auth');

Route::get('/prestasi','PrestasiController@index')->name('prestasi')->middleware('auth');
Route::post('/prestasi/import', 'PrestasiController@import')->middleware('auth');
Route::resource('prestasis','PrestasiController')->middleware('auth');

Route::get('/mahasiswa','MahasiswaController@index')->middleware('auth');
Route::post('/mahasiswa/import', 'MahasiswaController@import')->middleware('auth');
Route::resource('mahasiswas','MahasiswaController')->middleware('auth');

Route::get('/dosen','DosenController@index')->middleware('auth');
Route::post('/dosen/import', 'DosenController@import')->middleware('auth');
Route::resource('dosens','DosenController')->middleware('auth');

Route::get('/galeri','GaleriController@index')->middleware('auth');
Route::resource('galeris','GaleriController')->middleware('auth');

Route::get('/matakuliah','MatakuliahController@index')->middleware('auth');
Route::post('/matakuliah/import', 'MatakuliahController@import')->middleware('auth');
Route::resource('matakuliahs','MatakuliahController')->middleware('auth');

Route::get('/semester','SemesterController@index')->middleware('auth');
Route::resource('semesters','SemesterController')->middleware('auth');

Route::get('/mengajar','MengajarController@index')->middleware('auth');
Route::get('/mengajar/detail/{id}','MengajarController@detailMengajar')->middleware('auth');
Route::resource('mengajars','MengajarController')->middleware('auth');

Route::get('/artikelback','ArtikelController@index')->middleware('auth');
// Route::get('/jurnalback', 'JurnalController@backEndIndex')->middleware('auth');
// Route::get('/penelitianback','PenelitianController@backEndIndex')->middleware('auth');
Route::resource('penelitians','PenelitianController')->middleware('auth');
Route::get('/dashboard','DashboardController@index')->middleware('auth');
Route::post('/user/import', 'DashboardController@import')->middleware('auth');
Route::get('/loginmahasiswa','LoginmahasiswaController@index')->middleware('auth');
Route::get('/dosen/detail/{id}','DosenController@detailDosen')->middleware('auth');

Route::get('/ceklayout',function(){
    return view('layouts.argon');
});