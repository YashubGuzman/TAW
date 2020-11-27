@extends('layouts.app')

<!-- Definir la sección de los estilos del editor Trix -->
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection


@section('botones')
<a href="{{route ('recetas.index')}}" class="btn btn-primary mr-2" text-white>Regresar</a>
@endsection


@section('content')

<h2 class="text-center mb-5">Crear nueva receta</h2>

<!-- Diseñar el formulario para guardar receta-->
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{route('recetas.store')}}"
            enctype="multipart/form-data" novalidate>
            @csrf
            <!--Campo de receta-->

            <div class="form-group">
                    <label for="Titulo de receta"></label>
                    <input type="text"
                        name="receta"
                        class="form-control @error('receta') is-invalid @enderror"
                        placeholder="Título de la receta"
                        value="{{old('receta')}}"
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
                                    class="form-control @error('categoria') is-invalid @enderror"
                                    id="categoria">
                                    <option value="">--Seleccione--</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}"
                                    {{old('categoria')==$categoria->id ?'selected': ''}}
                                    >{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                                <!--Validación y mandamos retroalimentación al usuario -->
                                @error('categoria')
                                <spam class="invalid-feedback d-block" role="alert">
                                    <!-- Ponemos un mensaje de laravel-->
                                    <strong> {{$message}}</strong>
                                    @enderror
                            </div>
                            <!--Final del select -->

                            <!--Inicio campo de texto de preparación con Trix -->
                            <div class="form-group mt-3">
                                <label for="preparacion"> Preparación</label>
                                
                                <!--Campo de text de preparación, se agrega el elemento OLD para que no se elimine al actualizar la pagina -->
                                <input id="preparacion" type="hidden" name="preparacion" value="{{old('preparacion')}}">
                                
                                <!--Agregamos el editor -->
                                <trix-editor
                                class="form-control @error('preparacion') is-invalid @enderror"
                                input="preparacion"></trix-editor>
                                
                                <!--Validación de mensaje de error -->
                                @error('preparacion')
                                <spam class="invalid-feedback d-block" role="alert">
                                    <!--Poner el mensaje generado por laravel -->
                                    <strong>{{$message}}</strong>
                                    @enderror
                            </div>
                            <!--Fin de campo de texto preparación-->

                            <!--Inicio campo de texto de preparación con Trix -->
                            <div class="form-group mt-3">
                                <label for="ingredientes"> Ingredientes</label>
                                <!--Campo de text de preparación, se agrega el elemento OLD para que no se elimine al actualizar la pagina -->
                                <input id="ingredientes" type="hidden" name="ingredientes" value="{{old('ingredientes')}}">
                                <!--Agregamos el editor -->
                                <trix-editor
                                class="form-control @error('ingredientes') is-invalid @enderror"
                                input="ingredientes"></trix-editor>
                                <!--Validación de mensaje de error -->
                                @error('ingredientes')
                                <spam class="invalid-feedback d-block" role="alert">
                                    <!--Poner el mensaje generado por laravel -->
                                    <strong>{{$message}}</strong>
                                    @enderror
                            </div>
                            <!--Fin de campo de texto preparación-->

                            <!--Campo para carga de imagenes-->
                            <div class="form-group mt-3">
                                <label for="imagen"> Elige una imagen</label>
                                <input
                                    type="file"
                                    name="imagen"
                                    id="imagen"
                                    class="form-control @error('imagen') is-invalid @enderror">
                                    <!--Validar mensaje de error-->
                                    @error('imagen')
                                        <spam class="invalid-feedback d-block" role="alert">
                                        <!--Poner el mensaje generado por laravel -->
                                        <strong>{{$message}}</strong>
                                    @enderror
                                    
                                    <!--Fin de campo imagen-->
                            </div>
            <!--Botón-->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar receta" data-toggle="modal" data-target="#exampleModal">
            </div>
        </form>
    </div>
</div>


@endsection

<!-- Definir la sección de los scripts del editor Trix --> 
    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous"></script>
    @endsection