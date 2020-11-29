@extends('layouts.app')

@section('content')

<!--Contenedor para cada una de las recetas que pertenecen a la categoria seleccionada-->
<div class="container comida-mexicana">
    <h2 class="titulo-categoria mt-5 mb-4">Categoria: {{$categoria[0]->nombre}}</h2>
    
    <div class="row">
        @foreach($recetas as $receta)
        <div class="col-md-3">
            <div class="card">
                <img src={{ asset('storage').'/'.$receta->imagen}} class="card-img-top" alt="imagen receta">
    
                <div class="card-body">
                    <h3>{{Str::ucfirst($receta->receta)}}</h3>
    
                    <p> {{Str::words(strip_tags($receta->preparacion), 15)}} </p>
    
                    <a href="{{route ('recetas.ver', $receta->id_receta)}}" class="btn btn-danger mr-2 btn-block" text-white>VER RECETA</a>
    
                </div>
            </div>
            
        </div>
        @endforeach
    </div>
    </div>


@endsection