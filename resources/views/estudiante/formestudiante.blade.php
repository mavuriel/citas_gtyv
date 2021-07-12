@extends('layouts.app')

@section('title','Registro de cita')

@section('content')
{{-- TODO: falta vista de escritorio --}}
<main class="container flex flex-col justify-center items-center min-h-90">
    {{-- Card --}}
    <div class="bg-white w-80 lg:w-50 rounded-t-lg shadow-2xl px-4">
        <h1 class="text-center text-2xl font-semibold tracking-wide py-4 md:text-3xl md:font-bold">
            Agenda tu cita
        </h1>
        <form id="form" action="{{route('store.estudiante')}}" method="POST">
            @csrf
            <label for="date" class="tracking-wider font-light text-lg">
                Fecha
            </label>
            <input type="hidden" name="fecha" value="{{$fes}}">
            <input
                class="min-w-full border-0 border-b-2 border-gray-500 bg-opacity-30 bg-gray-400 cursor-not-allowed font-mono text-sm pb-2 md:text-base"
                id="date" type="text" value="{{$fes}}" readonly>

            <label for="hour" class="tracking-wider font-light text-lg">
                Horarios disponibles
            </label>
            <select id="hour"
                class="min-w-full border-0 border-b-2 border-gray-500 cursor-pointer font-mono text-sm pb-2 md:text-base"
                name="hora">
                <option value="" selected>Selecciona una hora</option>
                @foreach ($h as $p)
                <option value="{{$p}}">{{$p}}</option>
                @endforeach
            </select>
            <div class="py-1">
                @error('hora')
                <p class="font-thin text-xs text-red-400 tracking-wider">{{$message}}</p>
                @enderror
            </div>

            <label for="cite" class="tracking-wider font-light text-lg">
                Cita
            </label>
            <select id="cite"
                class="min-w-full border-0 border-b-2 border-gray-500 cursor-pointer font-mono text-sm pb-2 md:text-base"
                name="cita">
                <option value="" selected>Selecciona una opción</option>
                <option value="ss">Servicio Social</option>
                <option value="rd">Residencias profesionales</option>
            </select>
            <div class="py-1">
                @error('cita')
                <p class="font-thin text-xs text-red-400 tracking-wider">{{$message}}</p>
                @enderror
            </div>

            <label for="name" class="tracking-wider font-light text-lg">
                Nombre completo
            </label>
            <input id="name"
                class="min-w-full border-0 border-b-2 border-gray-500 placeholder-gray-400 font-mono text-xs pb-2 md:text-base"
                type="text" name="nombre" placeholder="p. ej. Pedro Martinez Herrera" value="{{old('nombre')}}">
            <div class="py-1">
                @error('nombre')
                <p class="font-thin text-xs text-red-400 tracking-wider">{{$message}}</p>
                @enderror
            </div>

            <label for="ncontrol" class="tracking-wider font-light text-lg">
                Número de control
            </label>
            <input id="ncontrol"
                class="min-w-full border-0 border-b-2 border-gray-500 placeholder-gray-400 font-mono text-xs md:text-base"
                type="text" name="control" placeholder="p. ej. E18029599" value="{{old('control')}}">
            <div class="py-2">
                @error('control')
                <p class="font-thin text-xs text-red-400 tracking-wider">{{$message}}</p>
                @enderror
            </div>

    </div>
    {{-- Botones --}}
    <div class="w-80 lg:w-50 flex text-center shadow-2xl text-white">
        <a class="bg-bluet w-50 rounded-bl-lg py-1" href="{{route('inicio.estudiante')}}">Regresar</a>
        <button class="bg-green-700 w-50 rounded-br-lg py-1" type="submit">Agendar</button>
    </div>
    </form>
</main>

@endsection
