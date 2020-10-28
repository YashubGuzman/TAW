@extends('layouts.app')
@section('botones')
<a href="{{route ('recetas.index')}}" class="btn btn-primary mr-2" text-white>Regresar</a>
@endsection


@section('content')

<h2 class="text-center mb-5">Crear nueva receta</h2>

<!-- Diseñar el formulario para guardar receta-->
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{route('recetas.store')}}">
            @csrf
            <!--Campo de receta-->
            <div class="form-group">
                    <label for="Titulo de receta"></label>
                    <input type="text"
                        name="receta"
                        class="form-control"
                        placeholder="Título de la receta"
                        />
            </div>
            <!--Botón-->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar receta">
            </div>
        </form>
    </div>
</div>
@endsection

