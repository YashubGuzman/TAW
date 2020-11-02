<?php

namespace App\Http\Controllers;

use DB; //Manda a llamar directamente la conexión para acceder a la base de datos
use App\Models\Receta2;
use Illuminate\Http\Request;

class Receta2Controller extends Controller
{
        //Validar la restricción a todos los métodos de usuario autenticado
        public function __construct(){
            $this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //Se guarda en una variable los datos de la tabla receta2s
        $recetas = DB::table('receta2s')->get();

        //Retornar a la vista recetas/listado enviando como parametro la variable en donde trajimos nuestros datos
        return view('recetas.listado',compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('recetas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $ban=1;

        
        $data=request()->validate([
            //Reglas de validación
            'receta'=>'required|min:6'
        ]);

        if($ban==1){
    
            //Fasad de Laravel para insertar un registro a la BD
        DB::table('receta2s')->insert([
            'receta'=>$data['receta']
            
        ]);

        $ban=2;
    
    }
        if($ban==2){
        return view('recetas.create');
        
    }
        //Almacena la receta a la BD
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function show(Receta2 $receta2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta2 $receta2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta2 $receta2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta2 $receta2)
    {
        //
    }
}
