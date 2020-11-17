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
    return view('inicio');
});

Auth::routes();


//Ruta para consumir un controlador llamado recetas

//Route::get('/recetas','App\Http\Controllers\RecetaController');

Route::get('/recetas','App\Http\Controllers\Receta2Controller@index')->name('recetas.index');

Route::get('/recetas/crear','App\Http\Controllers\Receta2Controller@create')->name('recetas.create');

Route::post('/recetas/crear','App\Http\Controllers\Receta2Controller@store')->name('recetas.store');

Route::get('/recetas/editar/{id}','App\Http\Controllers\Receta2Controller@edit')->name('recetas.edit');

Route::post('/recetas/editar','App\Http\Controllers\Receta2Controller@update')->name('recetas.update');

Route::get('/recetas/eliminar/{id}','App\Http\Controllers\Receta2Controller@destroy')->name('recetas.destroy');

Route::get('/recetas/ver/{id}','App\Http\Controllers\Receta2Controller@show')->name('recetas.ver');