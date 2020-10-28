@extends('layouts.app')
@section('botones')
<a href="{{route ('recetas.create')}}" class="btn btn-primary mr-2" text-white>Crear receta</a>
@endsection





@section('content')

<h2 class="text-center mb-5">Administra tus recetas </h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categoria</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($recetas as $recetas2)
                <tr>
                    <td>{{$recetas2->receta}}</td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

