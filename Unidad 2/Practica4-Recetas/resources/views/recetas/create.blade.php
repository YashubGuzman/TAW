@extends('layouts.app')
@section('botones')
<a href="{{route ('recetas.index')}}" class="btn btn-primary mr-2" text-white>Regresar</a>
@endsection


@section('content')

<h2 class="text-center mb-5">Crear nueva receta</h2>

<!-- Diseñar el formulario para guardar receta-->
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{route('recetas.store')}}" novalidate>
            @csrf
            <!--Campo de receta-->

            <div class="form-group">
                    <label for="Titulo de receta"></label>
                    <input type="text"
                        name="receta"
                        class="form-control @error('receta') is-invalid @enderror"
                        placeholder="Título de la receta"
                        value={{old('receta')}}
                        />

                        <!--Directiva de Laravel para poner un mensaje de error -->
                        @error('receta')
                            <spam class="invalid-feedback d-block" role="alert">
                                <!-- Ponemos un mensaje generado por Laravel -->
                                <strong>{{$message}}</strong>
                        @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for='categoria'>Categoria</label>
                                <select
                                    name="categoria";
                                    class="form-control @error('categoria') @enderror"
                                    id="categoria">
                                    @foreach($categorias as $id => $categoria)
                                    <option value="{{$id}}">
                                    @endforeach
                                </select>
                            </div>

            
                            
            </div>
            <!--Botón-->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar receta" data-toggle="modal" data-target="#exampleModal">
            </div>
        </form>
    </div>
</div>


@endsection

