@extends('layouts.plantilla')

@section('title','Pagina principal')

@section('content')
<h1>Gestion Tecnologica y Vinculacion</h1>
<h2>Hola, por favor verifica tu informacion personal</h2>
<a href="">Ver informacion</a>
<h2>Si ya fue verificada agenda tu cita</h2>

<form method="POST" action="{{route('cita.estudiante')}}">
    @csrf
    <label for=" date">¿Que dia quieres tu cita?</label>
    <input id="date" type="date" name="fecha">

    <input type="submit" value="Buscar">
</form>

@endsection
