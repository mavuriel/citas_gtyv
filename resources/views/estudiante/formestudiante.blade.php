@extends('layouts.app')

@section('title','Registro de cita')

@section('content')

{{-- TODO: buscar como hacer que no modifiquen el codigo HTML en el navegador y puedan enviar lo que quieran xD --}}
<main class="container mx-auto min-h-91 flex flex-col justify-center items-center  bg-gray-200 space-y-0">
    <div class="bg-white rounded-t-lg shadow-2xl border-solid border border-black mx-6 p-4">
        <h1 class="text-center text-2xl my-4">Agenda tu cita</h1>
        <form id="form" action="{{route('store.estudiante')}}" method="POST">
            @csrf
            <label for="date">Fecha</label>
            <input
                class="cursor-not-allowed bg-gray-300 bg-opacity-50 border-0 border-b-2 border-gray-400 min-w-full mb-4"
                id="date" type="date" name="fecha" value="{{$fes}}" readonly>
            <label for="hour">Horarios disponibles</label>
            <select id="hour"
                class="border-0 border-b-2 border-gray-400 min-w-full cursor-pointer focus:border-blue-600 focus:outline-none focus:ring-0 mb-4"
                name="hora">
                <option value="" selected>Selecciona una hora</option>
                @foreach ($h as $p)
                <option value="{{$p}}">{{$p}}</option>
                @endforeach
            </select>
            <label for="cite">Cita en</label>
            <select id="cite"
                class="border-0 border-b-2 border-gray-400 min-w-full cursor-pointer focus:border-blue-600 focus:outline-none focus:ring-0 mb-4"
                name="cita">
                <option value="" selected>Selecciona una opción</option>
                <option value="ss">Servicio Social</option>
                <option value="rd">Residencias profesionales</option>
            </select>
            <label for="name">Nombre completo</label>
            <input id="name"
                class="border-0 border-b-2 border-gray-400 min-w-full placeholder-gray-400 focus:border-blue-600 focus:outline-none focus:ring-0 mb-4"
                type="text" name="nombre" placeholder="p. ej. Pedro Martinez Herrera" pattern="([A-Z]([a-z])*(\s)*)*"
                required>
            <label for="ncontrol">Número de control</label>
            <input id="ncontrol"
                class="border-0 border-b-2 border-gray-400 min-w-full placeholder-gray-400 focus:border-blue-600 focus:outline-none focus:ring-0"
                type="text" name="control" placeholder="p. ej. E18029599"
                pattern="[E]([1][0-9]|[2][0-1])([0][1]|[0][2])\d{4}" required>

    </div>
    <div class="min-w-full px-6">
        <input class="text-white rounded-b-lg bg-bluet shadow-lg min-w-full px-28 py-2" type="submit"
            value="Guardar cita">
    </div>

    </form>
</main>

@endsection
