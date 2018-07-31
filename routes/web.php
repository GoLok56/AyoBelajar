<?php

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
    return view('index', ['selected' => 'Home']);
});

Route::get('/kelas', 'ClassController@index');
Route::get('/kelas/tambah', 'ClassController@form');
Route::post('/kelas/tambah', 'ClassController@tambah');

Route::get('/kelas/ambil/{id}', 'ClassController@ambil');
Route::get('/kelas/hapus/{id}', 'ClassController@hapus');
Route::get('/kelas/cari', 'ClassController@cari');
Route::get('/kelas/ubah/{id}', 'ClassController@ubah');
Route::post('/kelas/ubah', 'ClassController@update');
Route::post('/kelas/masuk', 'ClassController@masukKelas');
Route::get('/kelas/materi', 'ClassController@materi');
Route::get('/kelas/mulaimateri/{kelas}', 'ClassController@mulaiMateri');
Route::post('/kelas/materi', 'ClassController@simpanMateri');
Route::post('/kelas/selesaimateri', 'ClassController@selesaiMateri');
Route::get('/kelas/materi/{id}', 'ClassController@formTambahMateri');

Route::get('/kelas/saya', 'ClassController@kelasSaya');
Route::get('/kelas/kategori/saya/{id}', 'ClassController@kelasSayaCategory');

Route::get('/kelas/kategori/{category}', 'ClassController@kategori');

Route::get('/kelas/{id}', 'ClassController@detail');

Route::get('/profil', 'ProfileController@index');
Route::get('/profil/pembayaran', 'ProfileController@payment');
Route::get('/profil/ubah', 'ProfileController@edit');
Route::post('/profil/simpan', 'ProfileController@save');
Route::get('/profil/buktipembayaran', 'ProfileController@buktiPembayaran');
Route::post('/profil/buktipembayaran', 'ProfileController@simpanBuktiPembayaran');
Route::post('/profil/konfirmbuktipembayaran', 'ProfileController@konfirmBuktiPembayaran');
Route::get('/profil/buktipembayaran/list', 'ProfileController@listBuktiPembayaran');

Route::get('/kategori/tambah', 'KategoriController@form');
Route::post('/kategori/tambah', 'KategoriController@tambah');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');

Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@register');

Route::get('/admin/backup', 'AdminController@backup');
Route::get('/admin/restore', 'AdminController@restore');
Route::post('/admin/restore', 'AdminController@doRestore');
