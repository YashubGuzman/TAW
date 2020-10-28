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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//Ruta para mostrar un controlador que retorna un String

route::get('/hola','App\Http\Controllers\RecetaController');

//Ruta para consumir un controlador llamado recetas

Route::get('/recetas','App\Http\Controllers\RecetaController');

Route::get('/recetas/listado','App\Http\Controllers\Receta2Controller@index')->name('recetas.index');

Route::get('/recetas/listado/crear','App\Http\Controllers\Receta2Controller@create')->name('recetas.create');

Route::post('/recetas/listado/','App\Http\Controllers\Receta2Controller@store')->name('recetas.store');