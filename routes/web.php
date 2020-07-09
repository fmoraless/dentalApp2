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
    Route::resource('prestacion', 'PrestacionController')->except('show');
    Route::resource('presupuesto', 'PresupuestoController');
    Route::get('selectPrestacion', 'PrestacionController@selectPrestacion')->name('seleccione.prestacion');
    Route::get('presupuesto/create/{paciente?}', 'PresupuestoController@create')->name('presupuesto.create');


    //rutas para mensajes
    Route::resource('mensaje', 'MensajeController')->except('[index, create]');
    Route::get('mensajes/{paciente?}', 'MensajeController@index')->name('mensajes');
    Route::get('mensaje/create/{paciente?}', 'MensajeController@create')->name('mensaje.create');

    Route::get('/perfil', 'UserController@perfil')->name('perfil');
    Route::post('/perfil', 'UserController@updateAvatar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
