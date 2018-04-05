<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::post('exit', 'Auth\LoginController@logout')->name('logout');



// Route::resource('kabupaten', 'KabupatenController');
Route::resource('berita', 'BeritaController');
// Route::resource('userr', 'UserrController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/kabupaten/tambah', 'SuperController@tambah_kabupaten')->name('kabupaten.tambah');
Route::get('/kabupaten', 'SuperController@kabupaten')->name('kabupaten');
Route::post('/kabupaten/tambah/store', 'SuperController@storeKabupaten')->name('kabupaten.store');
Route::get('/kabupaten/edit/{id}', 'SuperController@edit_kabupaten')->name('kabupaten.edit');
Route::put('/kabupaten/edit/update/{id}', 'SuperController@updateKabupaten')->name('kabupaten.update');
Route::get('/opd', 'SuperController@opd')->name('opd.index');
Route::get('/opd/tambah', 'SuperController@tambah_opd')->name('opd.tambah');
Route::post('/opd/tambah/store', 'SuperController@storeOpd')->name('opd.store');
Route::get('/opd/edit/{id}', 'SuperController@edit_opd')->name('opd.edit');
Route::put('/opd/edit/update/{id}', 'SuperController@updateOpd')->name('opd.update');


Route::get('/upp', 'SuperController@upp')->name('upp.index');
Route::get('/upp/tambah', 'SuperController@tambah_upp')->name('upp.tambah');
Route::post('/upp/tambah/store', 'SuperController@storeUpp')->name('upp.store');
Route::get('/upp/edit/{id}', 'SuperController@edit_upp')->name('upp.edit');
Route::put('/upp/edit/update/{id}', 'SuperController@updateUpp')->name('upp.update');

Route::get('/kuesioner', 'SuperController@kuesioner')->name('kuesioner.index');
Route::get('/kuesioner/tambah', 'SuperController@tambah_kuesioner')->name('kuesioner.tambah');
Route::post('/kuesioner/tambah/store', 'SuperController@storeKuesioner')->name('kuesioner.store');
Route::get('/kuesioner/edit/{id}', 'SuperController@edit_kuesioner')->name('kuesioner.edit');
Route::put('/kuesioner/edit/update/{id}', 'SuperController@updateKuesioner')->name('kuesioner.update');
Route::get('/kuesioner/preview', 'SuperController@previewkuesioner')->name('kuesioner.preview');
Route::get('/kuesioner/jawab', 'SuperController@jawabkuesioner')->name('kuesioner.jawab');
Route::post('/kuesioner/jawab/store', 'SuperController@jawabStore')->name('jawab.store');

Route::get('/responden', 'SuperController@responden')->name('responden.index');
Route::get('/responden/tambah', 'SuperController@tambah_responden')->name('responden.tambah');
Route::post('/responden/tambah/store', 'SuperController@storeResponden')->name('responden.store');
Route::get('/responden/edit/{id}', 'SuperController@edit_responden')->name('responden.edit');
Route::put('/responden/edit/update/{id}', 'SuperController@updateResponden')->name('responden.update');