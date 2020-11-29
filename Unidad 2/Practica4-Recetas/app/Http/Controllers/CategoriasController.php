<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoriasController extends Controller
{
    public function show($id){

        $categoria = DB::table('categoria_recetas')
        ->where('id', '=', $id)->get();
        
        $recetas = DB::table('receta2s')
        ->where('categoria_id', '=', $id)->get();

        return view('categorias.verCategoria',compact('categoria', 'recetas'));
    }
}
