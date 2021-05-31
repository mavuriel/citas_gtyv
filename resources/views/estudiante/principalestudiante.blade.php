@extends('layouts.app')

@section('title','Pagina principal')

@section('opt_dep')
<script src="/js/jquery.js"></script>
<link href="/css/default.css" rel="stylesheet">
<link href="/css/default.date.css" rel="stylesheet">
<script src="/js/picker.js"></script>
<script src="/js/picker.date.js"></script>
<script src="/js/es_ES.js"></script>
@endsection

@section('content')
<main>
    <h1>Gestion Tecnologica y Vinculacion</h1>

    {{-- TODO: si tienes tiempo hazlo si no quitalo --}}
    <h2>Hola, por favor verifica tu informacion personal</h2>
    <a href="">Ver informacion</a>
    <h2>Si ya fue verificada agenda tu cita</h2>
    <br>
    @if(Session::has('no_hour'))
    <div>
        <p>{{Session::get('no_hour')}}</p>
    </div>
    @endif
    <br>

    <form id="form" action="{{route('cita.estudiante')}}" method="POST">
        @csrf
        <label for=" date">¿Que dia quieres tu cita?</label>
        <br>
        <input id="fecha" class="datepicker" autocomplete="off" placeholder="Selecciona una fecha" name="fecha">
        <input id="buscar" type="submit" value="Buscar">
    </form>
</main>

@endsection

@section('script-body')
var $input = $('#fecha').pickadate
({
disable: [1,7],
min:true,
max: 30,
format: 'yyyy-mm-dd'
})
@endsection
