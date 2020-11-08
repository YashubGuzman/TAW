@extends('layouts.app')
@section('botones')
<a href="{{route ('recetas.create')}}" class="btn btn-primary mr-2" text-white>Crear receta</a>
@endsection





@section('content')

<h2 class="text-center mb-5">Administra tus recetas </h2>
    <div class="col-md-12 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categoria</th>
                    <th scole="col">Ingredientes</th>
                    <th scole="col">Preparación</th>
                    <th scole="col">Usuario</th>
                    <th scole="col">Imagen</th>
                </tr>
            </thead>
            <tbody>

                @foreach($recetas as $recetas2)
                <tr>
                    <td>{{$recetas2->receta}}</td>
                    <td>{{$recetas2->nombre}}</td>
                    <td>{{$recetas2->ingredientes}}</td>
                    <td>{{$recetas2->preparacion}}</td>
                    <td>{{$recetas2->name}}</td>
                    <td>
                    <img src="{{ asset('storage').'/'.$recetas2->imagen}}" alt="" width="100">
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

