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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Route::get('/','AlumnosController@index')->name('inicio');
Route::get('/',function(){return view('auth.login');});

//rutas de controlador de alumnos
Route::get('alumnos/index','alumnoscontroller@index')->name('alumnos.index');
Route::get('alumnos/altas','AlumnosController@store')->name('alumnos.altas');
Route::get('alumnos/update/{id}','AlumnosController@update')->name('alumnos.update');
route::get('alumnos/delete/{id}','alumnoscontroller@destroy')->name('alumnos.delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
