@extends('layouts.plantilla')

@section('title','Registro de cita')

@section('content')

{{-- <p>{{$msn}}</p> --}}
{{-- <p>{{$taken}}</p> --}}

<select name="freehours">
    @foreach ($taken as $t)
    <option value="">{{$t -> hour_taken }}</option>
    @endforeach
</select>

<ul>
    @foreach ($jsonp as $t )
    <li>{{$t->hour_taken}}</li>
    @endforeach
</ul>



<form id="form" action="{{route('store.estudiante')}}" method="POST">
    @csrf
    <label for="cite">Tipo de cita</label>
    <select id="cite" name="cita">
        <option value="" selected>Selecciona una opcion</option>
        <option value="ss">Servicio Social</option>
        <option value="rd">Residencias</option>
    </select>
    <br>
    <label for="name">Ingresa tu nombre</label>
    <input id="name" type="text" name="nombre">
    <br>
    <label for="ncontrol">Ingresa tu numero de control</label>
    <input id="ncontrol" type="text" name="control">
    <br>
    <label for="date">Elige el dia</label>
    {{--     <input id="date" type="date" name="fecha" value="{{$fes}}" readonly> --}}
    <br>
    <label for="hour">Elige la hora</label>
    <input id="hour" type="time" name="hora">
    <br>
    <input type="submit" value="Enviar formulario">
</form>

@endsection
