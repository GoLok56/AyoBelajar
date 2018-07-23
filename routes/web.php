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
Route::get('/kelas/{id}', 'ClassController@detail');
Route::get('/kelas/kategori/{category}', 'ClassController@kategori');

Route::get('/profil', 'ProfileController@index');
Route::get('/profil/pembayaran', 'ProfileController@payment');
Route::get('/profil/ubah', 'ProfileController@edit');
Route::post('/profil/simpan', 'ProfileController@save');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');

Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@register');
