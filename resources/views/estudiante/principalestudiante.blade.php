@extends('layouts.app')

@section('title','Pagina principal')

@section('opt_dep')
<script src="/js/jquery.js"></script>
<link href="/css/default.css" rel="stylesheet">
<link href="/css/default.date.css" rel="stylesheet">
<script src="/js/picker.js"></script>
<script src="/js/picker.date.js"></script>
<script src="/js/es_ES.js"></script>
<script src="{{asset('js/dateformat.js')}}" defer></script>
@endsection

@section('content')
<div class="bg-gray-300">
    <main class="contprin lg:grid-rows-6">
        <div class="text-center">
            <h1 class="h1mb lg:uppercase lg:font-bold">Gestión Tecnológica
                <wbr>y Vinculación</h1>
        </div>

        {{-- Primer Card --}}
        <div class="card1mb lg:mx-auto lg:row-start-2 lg:w-60 ">
            <p class="card1p lg:pb-2 lg:text-xl lg:font-medium">Hola, por favor verifica tu información personal antes
                de
                agendar tu cita.
            </p>
            <div class="contbtncard1">
                <a class="btninfocard1 " href="https://www.google.com">Ver información</a>
            </div>
        </div>
        {{-- Notificacion de horas no disponibles --}}
        <div>
            {{-- TODO: modificar para que desaparezca --}}
            @if(Session::has('no_hour'))
            <div class="warnnt lg:row-start-3 lg:w-60 lg:mx-auto">
                <p>{{Session::get('no_hour')}}</p>
            </div>
            @endif
        </div>
        {{-- Segunda Card --}}
        <div class="card2mb lg:row-start-4 lg:w-50 lg:mx-auto">
            <form id="form" action="{{route('cita.estudiante')}}" method="POST">
                @csrf
                <div class="my-1 lg:text-xl lg:font-medium lg:pb-2">
                    <label for="fecha">¿Qué día quieres tu cita?</label>
                </div>
                <div class="contcardbtn">
                    <input class="idatep datepicker" id="fecha" autocomplete="off" placeholder="Selecciona una fecha"
                        name="fecha">
                    <button class="btnsearch" id="buscar" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
