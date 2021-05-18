@extends('layouts.plantilla')

@section('title','Registro de cita')

@section('content')


<div id="cal-container" class="m-56 visible">
    <div id="calendar" style="max-width: 500px"></div>
</div>

<div>
    <button id="buttonmodal" type="button">Abre modal</button>
</div>

<div id="modal"
    class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-blue-500 bg-opacity-50 transform scale-0 transition-transform duration-300">
    <div class="z-50 bg-white w-1/2 h-1/2 p-12"> {{-- modal content --}}
        <button id="closebutton" type="button" class="focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
        <form id="form" action="" {{-- {{route('store.estudiante')}}" method="POST" --}}>
            @csrf
            <label for="title">Tipo de cita</label>
            <select name="title" id="title">
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
            {{-- <label for="date">Elige el dia</label>
            <input id="date" type="date" name="fecha">
            <br>
            <label for="hour">Elige la hora</label>
            <input id="hour" type="time" name="hora">
            <br> --}}
            <label for="start">start</label>
            <input type="text" name="start" id="start">

            <label for="end">end</label>
            <input type="text" name="end" id="end">

            <button id="submitbtn">Enviar</button>
            {{--             <input id="submitbtn" type="submit" value="Enviar formulario">

 --}} </form>


    </div>
</div>


@endsection
