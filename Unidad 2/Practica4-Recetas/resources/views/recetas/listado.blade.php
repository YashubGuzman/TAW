@extends('layouts.app')
@section('botones')
<a href="{{route ('recetas.create')}}" class="btn btn-outline-danger mr-2" text-white>CREAR RECETA</a>
@endsection

@section('content')

<h2 class="text-center mb-5">Administra tus recetas </h2>
    <div class="col-md-12 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-danger text-light">
                <tr>   
                    <th scole="col">Imagen</th>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categoria</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($recetas as $recetas2)
                <tr>
                    <td><img src="{{ asset('storage').'/'.$recetas2->imagen}}" alt="" width="120"></td>
                    <td>{{$recetas2->receta}}</td>
                    <td>{{$recetas2->categoria->nombre}}</td>

                    <td>
                    
                        <a href="{{route ('recetas.destroy', $recetas2->id_receta)}}" class="btn btn-danger mr-2 btn-block" text-white>Eliminar</a>
                    
                        <a href="{{route ('recetas.edit', $recetas2->id_receta)}}" class="btn btn-dark mr-2 btn-block" text-white>Editar</a>
                    
                        <a href="{{route ('recetas.ver', $recetas2->id_receta)}}" class="btn btn-success mr-2 btn-block" text-white>Ver</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

