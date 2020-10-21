<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    //Primer método del controlador RecetaController que retornará un String
    public function __invoke(){

        //Consulta no. 1: envio del array 'recetas' a la vista
        $recetas = ['Receta de fresa', 'Receta de uva', 'Receta de limon'];

        //Consulta no. 2, envio del array 'categorias' a la vista
        $categorias = ['Comida mexicana', 'Comida argentina', 'Postres'];

        //Pasar a la vista el array (sintaxis 1):
        //Retornar a la vista recetas/index
        return view('recetas.index')
                ->with('recetas',$recetas)
                ->with('categorias',$categorias);

        //Pasar a la vista el array (sintaxis 2):
     //   return view('recetas.index',compact('recetas'));
    }
}
