@extends('layouts.app');

@section('content')



<h1>Listado de recetas </h1>

@foreach($recetas as $recetas2)
    <li>{{$recetas2->receta}}</li>
@endforeach

@endsection