@extends('layouts.app')

@section('botones')
<a href="{{route ('recetas.index')}}" class="btn btn-primary mr-2" text-white>Regresar</a>
@endsection

@section('content')

<article class="contenido-receta">
    <h1 class="text-center mb-4">{{$recetas[0]->receta}}</h1>

    <div class="col-md-10 mx-auto bg-white p-3">
        <img src={{ asset('storage').'/'.$recetas[0]->imagen}} class="w-100">

        <p>
            <span class="font-weight-bold text-primary">Categoria:</span>
                {{$recetas[0]->nombre}}
            </p>

            <span class="font-weight-bold text-primary">Autor:</span>
                {{$recetas[0]->name}}
            </p>

            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>
                {!! $recetas[0]->ingredientes !!}
            </div>

            <div class="preparacion">
                <h2 class="my-3 text-primary">Preparación</h2>
                {!! $recetas[0]->preparacion !!}
            </div>

    </div>
</article>

@endsection