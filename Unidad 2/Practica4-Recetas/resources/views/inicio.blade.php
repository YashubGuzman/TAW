@extends('layouts.app')

@section('content')

@section('banner')
<article class="contenido-receta">
    
    <div class="col-md-13 mx-auto">
         
        <img src={{ asset('storage').'/'.'img/banner.jpg'}} class="w-100">
    

    </div>
</article>
@endsection

<!--Aqui se muestran las ultimas 4 recetas que han sido agregadas al sistema -->

<div class="container ultimas-recetas">
<h2 class="titulo-categoria mt-5 mb-4">ÚLTIMAS RECETAS</h2>

<div class="row">
    @foreach($ultimas as $ultima)
    <div class="col-md-3">
        <div class="card">
            <img src={{ asset('storage').'/'.$ultima->imagen}} class="card-img-top" alt="imagen receta">

            <div class="card-body">
                <h3>{{Str::ucfirst($ultima->receta)}}</h3>

                <p> {{Str::words(strip_tags($ultima->preparacion), 15)}} </p>

                <a href="{{route ('recetas.ver', $ultima->id_receta)}}" class="btn btn-danger mr-2 btn-block" text-white>VER RECETA</a>

            </div>
        </div>
        
    </div>
    @endforeach
</div>
</div>


<!--Aqui se muestran las ultimas 4 recetas de COMIDA MEXICANA que han sido agregadas al sistema -->

<div class="container comida-mexicana">
    <h2 class="titulo-categoria mt-5 mb-4">COMIDA MEXICANA</h2>
    
    <div class="row">
        @foreach($mexicanas as $mexicana)
        <div class="col-md-3">
            <div class="card">
                <img src={{ asset('storage').'/'.$mexicana->imagen}} class="card-img-top" alt="imagen receta">
    
                <div class="card-body">
                    <h3>{{Str::ucfirst($mexicana->receta)}}</h3>
    
                    <p> {{Str::words(strip_tags($mexicana->preparacion), 15)}} </p>
    
                    <a href="{{route ('recetas.ver', $mexicana->id_receta)}}" class="btn btn-danger mr-2 btn-block" text-white>VER RECETA</a>
    
                </div>
            </div>
            
        </div>
        @endforeach
    </div>
    </div>



<!--Aqui se muestran las ultimas 4 recetas de COMIDA ITALIANA que han sido agregadas al sistema -->

<div class="container comida-italiana">
    <h2 class="titulo-categoria mt-5 mb-4">COMIDA ITALIANA</h2>
    
    <div class="row">
        @foreach($italianas as $italiana)
        <div class="col-md-3">
            <div class="card">
                <img src={{ asset('storage').'/'.$italiana->imagen}} class="card-img-top" alt="imagen receta">
    
                <div class="card-body">
                    <h3>{{Str::ucfirst($italiana->receta)}}</h3>
    
                    <p> {{Str::words(strip_tags($italiana->preparacion), 15)}} </p>
    
                    <a href="{{route ('recetas.ver', $italiana->id_receta)}}" class="btn btn-danger mr-2 btn-block" text-white>VER RECETA</a>
    
                </div>
            </div>
            
        </div>
        @endforeach
    </div>
    </div>


<!--Aqui se muestran las ultimas 4 recetas de COMIDA ARGENTINA que han sido agregadas al sistema -->

<div class="container comida-argentina">
    <h2 class="titulo-categoria mt-5 mb-4">COMIDA ARGENTINA</h2>
    
    <div class="row">
        @foreach($argentinas as $argentina)
        <div class="col-md-3">
            <div class="card">
                <img src={{ asset('storage').'/'.$argentina->imagen}} class="card-img-top" alt="imagen receta">
    
                <div class="card-body">
                    <h3>{{Str::ucfirst($argentina->receta)}}</h3>
    
                    <p> {{Str::words(strip_tags($argentina->preparacion), 15)}} </p>
    
                    <a href="{{route ('recetas.ver', $argentina->id_receta)}}" class="btn btn-danger mr-2 btn-block" text-white>VER RECETA</a>
    
                </div>
            </div>
            
        </div>
        @endforeach
    </div>
    </div>


    <!--Aqui se muestran las ultimas 4 recetas de POSTRESS que han sido agregadas al sistema -->

<div class="container postres">
    <h2 class="titulo-categoria mt-5 mb-4">POSTRES</h2>
    
    <div class="row">
        @foreach($postres as $postre)
        <div class="col-md-3">
            <div class="card">
                <img src={{ asset('storage').'/'.$postre->imagen}} class="card-img-top" alt="imagen receta">
    
                <div class="card-body">
                    <h3>{{Str::ucfirst($postre->receta)}}</h3>
    
                    <p> {{Str::words(strip_tags($postre->preparacion), 15)}} </p>
    
                    <a href="{{route ('recetas.ver', $postre->id_receta)}}" class="btn btn-danger mr-2 btn-block" text-white>VER RECETA</a>
    
                </div>
            </div>
            
        </div>
        @endforeach
    </div>
    </div>



    <!--Aqui se muestran las ultimas 4 recetas de COMIDA CORTES que han sido agregadas al sistema -->

<div class="container cortes">
    <h2 class="titulo-categoria mt-5 mb-4">CORTES</h2>
    
    <div class="row">
        @foreach($cortes as $corte)
        <div class="col-md-3">
            <div class="card">
                <img src={{ asset('storage').'/'.$corte->imagen}} class="card-img-top" alt="imagen receta">
    
                <div class="card-body">
                    <h3>{{Str::ucfirst($corte->receta)}}</h3>
    
                    <p> {{Str::words(strip_tags($corte->preparacion), 15)}} </p>
    
                    <a href="{{route ('recetas.ver', $corte->id_receta)}}" class="btn btn-danger mr-2 btn-block" text-white>VER RECETA</a>
    
                </div>
            </div>
            
        </div>
        @endforeach
    </div>
    </div>


@endsection