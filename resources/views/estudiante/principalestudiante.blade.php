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

<main class="bg-gray-300 container grid grid-rows-5 gap-2 justify-center items-center  min-h-91 font-sans">
    <div class="text-center">
        <h1 class="text-3xl font-medium tracking-wider mx-6 lg:uppercase">Gestión Tecnológica
            <wbr>y Vinculación</h1>
    </div>

    {{-- Primer Card --}}
    <div class="bg-gray-100 mx-6 p-2 rounded-lg border border-black shadow-2xl text-center lg:row-start-3">
        {{-- TODO: si tienes tiempo hazlo si no quitalo --}}
        <p class="mx-4 text-sm font-light leading-tight">Hola, por favor verifica tu información personal antes de
            agendar tu cita
        </p>
        <div class=" font-mono font-extralight text-white mt-2 mb-1 mx-12 ">
            <a class=" bg-bluet rounded-full py-2 px-5 hover:ring-4 hover:ring-blue-400 hover:ring-offset-0 hover:ring-opacity-75 active:bg-blue-500"
                href="https://www.google.com">Ver información</a>
        </div>
    </div>
    <div>
        {{-- TODO: modificar para que desaparezca --}}
        @if(Session::has('no_hour'))
        <div
            class="font-mono text-center text-yellow-600 bg-yellow-400 bg-opacity-40   m-6 p-4 border border-yellow-600 rounded-md leading-tight">
            <p>{{Session::get('no_hour')}}</p>
        </div>
        @endif
    </div>
    {{-- Segunda Card --}}
    {{-- TODO:  la informacion se envia vacia xD necesitas validarlo --}}
    <div class="text-center row-start-4 bg-gray-100 mx-6 p-2 rounded-lg border border-black shadow-2xl lg:row-start-3">
        <form id="form" action="{{route('cita.estudiante')}}" method="POST">
            @csrf
            <div class="my-2">
                <label for="fecha">¿Qué día quieres tu cita?</label>
            </div>
            <div class="flex space-x-0 justify-center">
                <input
                    class="bg-white placeholder-gray-500 placeholder-opacity-50 rounded-l-lg border border-gray-300 p-2"
                    id="fecha" class="datepicker" autocomplete="off" placeholder="Selecciona una fecha" name="fecha">
                <button class="bg-bluet rounded-r-lg p-2 text-white" id="buscar" type="submit"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</main>
@endsection
