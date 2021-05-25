@extends('layouts.plantilla')

@section('title','Mis citas')

@section('content')
<h1>Hola {{$cita}} aqui se mostraran tus citas</h1>
<a href="{{route('inicio.estudiante')}}">Regresa a estudiante</a>
@endsection
