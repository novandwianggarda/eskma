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


Route::get('/home', 'HomeController@index');

Route::resource('kabupaten', 'KabupatenController');
Route::resource('berita', 'BeritaController');
Route::resource('userr', 'UserrController');