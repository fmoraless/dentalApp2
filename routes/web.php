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

use Illuminate\Routing\RouteGroup;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('paciente', 'PacienteController');
    Route::resource('presupuesto', 'PresupuestoController');
    Route::resource('prestacion', 'PrestacionController')->except('show');

    Route::get('/perfil', 'UserController@perfil')->name('perfil');
    Route::post('/perfil', 'UserController@updateAvatar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
