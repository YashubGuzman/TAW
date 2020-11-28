<?php

namespace App\Http\Controllers;

use DB; //Manda a llamar directamente la conexión para acceder a la base de datos
use App\Models\Receta2;
use App\Models\CategoriaReceta;
use Illuminate\Http\Request;

class Receta2Controller extends Controller
{
        //Validar la restricción a todos los métodos de usuario autenticado
        public function __construct(){
            $this->middleware('auth',['except' => 'show']);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //Se guarda en una variable los datos de la tabla receta2s
        $recetas = auth()->user()->recetas;

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
        //Creamos una consulta a la db sobre las categorias de las recetas
        $categorias = CategoriaReceta::all(['id', 'nombre']);    

        //Manda a la vista del formulario
        return view('recetas.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){   
        //Accedemos a un campo del $request y lo almacenamos con store y la ruta de guardado

        $data=request()->validate([
            //Reglas de validación
            'receta'=>'required|min:6',
            'categoria' => 'required',
            'preparacion'=>'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image|',
        ]);

        //Obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('uploads-recetas','public');


            //Almacenar en la BD (con modelo) recetas por usuario
            auth()->user()->recetas()->create([
                'receta'=>$data['receta'],
                'categoria_id'=>$data['categoria'],
                'ingredientes'=>$data['ingredientes'],
                'preparacion'=>$data['preparacion'],
                'imagen'=>$ruta_imagen,
            ]);
 
        return redirect("/recetas");
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Se guarda en una variable los datos de la tabla receta2s
        $recetas = DB::table('receta2s')
        ->join('categoria_recetas', 'categoria_recetas.id', '=', 'receta2s.categoria_id')  //inner join para traer el nombre de la categoria correspondiente al id
        ->join('users', 'users.id', '=', 'receta2s.user_id')    //inner join para traer el nombre del usuario que creo la receta correspondiente al ids
        ->where('id_receta', '=', $id)->get();

        //Retornar a la vista recetas/listado enviando como parametro la variable en donde trajimos nuestros datos
        return view('recetas.ver',compact('recetas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Creamos una consulta a la db sobre las categorias de las recetas
        $categorias = DB::table('categoria_recetas')->get()->pluck('nombre','id'); //Esta consulta retorna un array con los elementos de la tabla categoria

        $recetas = DB::table('receta2s')->where('id_receta', '=', $id)->get();

       // return view('recetas.edit')->with('categorias',$categorias, 'recetas', $recetas);

        return view('recetas.edit',compact('categorias','recetas'));
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
        //Accedemos a un campo del $request y lo almacenamos con store y la ruta de guardado
        $data=request()->validate([
            //Reglas de validación
            'id'=>'required',
            'receta'=>'required|min:6',
            'categoria' => 'required',
            'preparacion'=>'required',
            'ingredientes' => 'required',
            'imagen' => 'image',
        ]);

        

        //Verifica si se inserto una imagen, en caso de que si hara la inserción con la imagen en caso de que no, se quedara la imagen original
        if ($_FILES['imagen']['name'] != null) {

            //Obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('uploads-recetas','public');

            DB::table('receta2s')
            ->where('id_receta', $data['id'])
            ->update(['receta'=>$data['receta'],
            'categoria_id'=>$data['categoria'],
            'ingredientes'=>$data['ingredientes'],
            'preparacion'=>$data['preparacion'],
            'imagen'=>$ruta_imagen,
            'updated_at'=>date('Y-m-d H:i:s')]);
        }else{
            DB::table('receta2s')
            ->where('id_receta', $data['id'])
            ->update(['receta'=>$data['receta'],
            'categoria_id'=>$data['categoria'],
            'ingredientes'=>$data['ingredientes'],
            'preparacion'=>$data['preparacion'],
            'updated_at'=>date('Y-m-d H:i:s')]);
        }
        return redirect("/recetas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta2  $receta2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar receta
        DB::table('receta2s')->where('id_receta', '=', $id)->delete();
        
        return redirect("/recetas");
        
    }

    public function like($id){

        //Consulta a la tabla de likes para saber si existe o no ese like
        $like_verify = DB::table('likes_receta')->where([
        ['user_id', '=', auth()->user()->id],
        ['receta_id', '=', $id],
        ])->get();


        //Hace un conteo de elementos en el array para ver si trajo un registro de like
        $conteo = collect($like_verify)->count();



        //Si no hay registros se va a registrar el like y en caso contrario se eliminara
        if($conteo == 0){
            //Registra el like en la base de datos
            DB::table('likes_receta')->insert(
                ['user_id' => auth()->user()->id,
                'receta_id' => $id]
            );
        }else{
            //Eliminar like
            DB::table('likes_receta')->
            where('id', '=', $like_verify[0]->id)->delete();
        }

        return redirect("/recetas/ver/$id");

    
    }

}
