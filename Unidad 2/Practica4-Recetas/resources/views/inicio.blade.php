@extends('layouts.app')

@section('content')

@section('banner')
<article class="contenido-receta">
    
    <div class="col-md-13 mx-auto">
         
        <img src={{ asset('storage').'/'.'img/banner.jpg'}} class="w-100">
    

    </div>
</article>
@endsection

<div class="container nuevas-recetas">
<h2 class="titulo-categoria mt-5 mb-4">ÚLTIMAS RECETAS</h2>

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





<!--
<div class="row">

    <div class="col-md-3 bg-white p-10 shadow p-3 mb-5 bg-white rounded">

        <img src={{ asset('storage').'/'.'uploads-recetas\3KTYReGdy59imQFSqWE4ztFpdIWOJLn1adJ4PmQO.jpeg'}} class="w-100">

        <div class="ingredientes">
            <h2 class="my-2">Titulo</h2>
            Aqui va el texto
        </div>
        
    </div>

    <div class="col-md-3 bg-white p-10 shadow p-3 mb-5 bg-white rounded">

        <img src={{ asset('storage').'/'.'uploads-recetas\3KTYReGdy59imQFSqWE4ztFpdIWOJLn1adJ4PmQO.jpeg'}} class="w-100">

        <div class="ingredientes">
            <h2 class="my-2">Titulo</h2>
            Aqui va el texto
        </div>
        
    </div>
</div>
-->

@endsection