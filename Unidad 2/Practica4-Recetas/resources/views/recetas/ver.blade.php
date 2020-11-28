@extends('layouts.app')

@section('botones')
<a href="{{route ('recetas.index')}}" class="btn btn-primary mr-2" text-white>Regresar</a>
@endsection

@section('content')

<article class="contenido-receta">
    

    <div class="col-md-10 mx-auto bg-white p-5 shadow p-3 mb-5 bg-white rounded">

        <h1 class="text-center mb-4">{{$recetas[0]->receta}}</h1>

        <img src={{ asset('storage').'/'.$recetas[0]->imagen}} class="w-100">

        <p>
            <span class="font-weight-bold text-danger">Categoria:</span>
                {{$recetas[0]->nombre}}
            </p>

            <span class="font-weight-bold text-danger">Autor:</span>
                {{$recetas[0]->name}}
            </p>

            <div class="ingredientes">
                <h2 class="my-3 text-danger">Ingredientes</h2>
                {!! $recetas[0]->ingredientes !!}
            </div>

            <div class="preparacion">
                <h2 class="my-3 text-danger">Preparación</h2>
                {!! $recetas[0]->preparacion !!}
            </div>

            <!-- Boton para dar like a la receta -->
            <div class="like text-center">
                <a href="{{route ('recetas.like', $recetas[0]->id_receta)}}" class="btn btn-primary" text-white>Me gusta</a>
            </div>

    </div>
</article>

@endsection