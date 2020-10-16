<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//RUTA PARA LA VISTA PRINCIPAL
Route::get('/principal', function () {
    return view('principal');
});

//RUTA PARA EL FORMULARIO
Route::get('/formulario', function () {
    return view('formulario');
});

//RUTA PARA USUARIOS
Route::get('/user',[UserController::class,'index'])->name('user.index');