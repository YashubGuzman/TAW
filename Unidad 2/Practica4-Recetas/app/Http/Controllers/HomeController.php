<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ultimas = DB::table('receta2s')
        ->latest()->limit(4)
        ->get();

        $mexicanas = DB::table('receta2s')
        ->latest()->limit(4)
        ->where('categoria_id', '1')
        ->get();

        $italianas = DB::table('receta2s')
        ->latest()->limit(4)
        ->where('categoria_id', '2')
        ->get();

        $argentinas = DB::table('receta2s')
        ->latest()->limit(4)
        ->where('categoria_id', '3')
        ->get();

        $postres = DB::table('receta2s')
        ->latest()->limit(4)
        ->where('categoria_id', '4')
        ->get();

        $cortes = DB::table('receta2s')
        ->latest()->limit(4)
        ->where('categoria_id', '5')
        ->get();

        return view('inicio',compact('ultimas','mexicanas','italianas','argentinas','postres','cortes'));
    }
}
