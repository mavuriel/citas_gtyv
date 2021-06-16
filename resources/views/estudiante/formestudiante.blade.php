@extends('layouts.app')

@section('title','Registro de cita')

@section('content')

<div class="bg-gray-200">
    <main class="contform ">
        {{-- Card --}}
        <div class="contformcard lg:w-35">
            <h1 class="text-center text-2xl my-4 lg:uppercase lg:text-2xl lg:tracking-wider lg:font-bold">Agenda tu cita
            </h1>
            <form id="form" action="{{route('store.estudiante')}}" method="POST">
                @csrf
                <label for="date" class="lg:font-semibold lg:text-lg">Fecha</label>
                <input class="indis" id="date" type="date" name="fecha" value="{{$fes}}" readonly>
                <label for="hour" class="lg:font-semibold lg:text-lg">Horarios disponibles</label>
                <select id="hour" class="selcont" name="hora">
                    <option value="" selected>Selecciona una hora</option>
                    @foreach ($h as $p)
                    <option value="{{$p}}">{{$p}}</option>
                    @endforeach
                </select>
                <label for="cite" class="lg:font-semibold lg:text-lg">Cita en</label>
                <select id="cite" class="selcont" name="cita">
                    <option value="" selected>Selecciona una opción</option>
                    <option value="ss">Servicio Social</option>
                    <option value="rd">Residencias profesionales</option>
                </select>
                <label for="name" class="lg:font-semibold lg:text-lg">Nombre completo</label>
                <input id="name" class="formin mb-4" type="text" name="nombre"
                    placeholder="p. ej. Pedro Martinez Herrera" pattern="([A-Z]([a-z])*(\s)*)*" required>
                <label for="ncontrol" class="lg:font-semibold lg:text-lg">Número de control</label>
                <input id="ncontrol" class="formin" type="text" name="control" placeholder="p. ej. E18029599"
                    pattern="[E]([1][0-9]|[2][0-1])([0][1]|[0][2])\d{4}" required>
        </div>
        {{-- Boton --}}
        <div class="min-w-full px-6 lg:min-w-38">
            <input class="btnsub" type="submit" value="Guardar cita">
        </div>
        </form>
    </main>
</div>

@endsection
