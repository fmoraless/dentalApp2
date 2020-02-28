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
    return view('welcome');
});

Route::get('/perfil', 'UserController@perfil')->name('perfil');
Route::post('/perfil', 'UserController@updateAvatar');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
