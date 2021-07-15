@extends('layouts.app')

@section('title','Mis citas')

@section('content')

@if(Session::has('dato_act'))
<div class="warnnt lg:row-start-3 lg:w-60 lg:mx-auto">
    <p>{{Session::get('dato_act')}}</p>
</div>
@endif

<main class="container flex flex-col justify-center items-center min-h-80 py-4">
    {{-- Card --}}
    <div class="bg-white w-80 lg:w-50 rounded-t-lg shadow-2xl px-4">
        <h1 class="text-center text-2xl font-semibold tracking-wide py-4 md:text-3xl md:font-bold">
            Informacion personal
        </h1>
        <form action="{{route('store.info')}}" method="POST">
            @csrf
            <label for="name" class="tracking-wider font-light text-lg">
                Nombre completo
            </label>
            <input id="name" type="text" name="namep" value="{{auth()->user()->name}}"
                placeholder="p. ej. Pedro Martinez Herrera"
                class="min-w-full border-0 border-b-2 border-gray-500 cursor-pointer font-mono text-sm pb-2 md:text-base">
            <div class="py-1">
                @error('namep')
                <p class="font-thin text-xs text-red-400 tracking-wider">{{$message}}</p>
                @enderror
            </div>
            <label for="control" class="tracking-wider font-light text-lg">
                Numero de control
            </label>
            <input id="control" type="text" name="ncontrolp" value="{{auth()->user()->n_control}}"
                placeholder="p. ej. E18029599"
                class="min-w-full border-0 border-b-2 border-gray-500 cursor-pointer font-mono text-sm pb-2 md:text-base">
            {{-- Cambiar el nombre que se muestra en el error ver video donde es --}}
            <div class="py-1">
                @error('ncontrolp')
                <p class="font-thin text-xs text-red-400 tracking-wider">{{$message}}</p>
                @enderror
            </div>
            <label for="area" class="tracking-wider font-light text-lg">
                Area
            </label>
            <input id="area" type="text" name="areap" value="{{auth()->user()->area}}"
                class="min-w-full border-0 border-b-2 border-gray-500 cursor-pointer font-mono text-sm pb-2 md:text-base">
            <div class="py-1">
                @error('areap')
                <p class="font-thin text-xs text-red-400 tracking-wider">{{$message}}</p>
                @enderror
            </div>
            <label for="phone" class="tracking-wider font-light text-lg">
                Telefono
            </label>
            <input id="phone" type="text" name="phonep" value="{{auth()->user()->phone}}"
                class="min-w-full border-0 border-b-2 border-gray-500 cursor-pointer font-mono text-sm pb-2 md:text-base">
            <div class="py-1">
                @error('phonep')
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

    <table class="rounded-t-lg w-50 md:w-50  mx-auto bg-bluet text-white mt-4 ">
        <thead>
            <tr class="text-center border-b-2 border-gray-300">
                <th class="h-2 p-2 uppercase md:p-4" colspan="4">
                    Mis citas
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center border-b-2 border-gray-600">
                <td class="w-5 px-2 py-2 md:w-10 md:px-4 md:py-3">Fecha</td>
                <td class="w-5 px-2 py-2 md:w-10 md:px-4 md:py-3">Dia</td>
                <td class="w-5 px-2 py-2 md:w-10 md:px-4 md:py-3">Servicio</td>
                <td class="w-5 px-2 py-2 md:w-10 md:px-4 md:py-3"></td>
            </tr>
            @foreach ($citas as $c)
            <tr class="text-center border-b-2 border-gray-600">
                <td class="w-5 px-2 py-2 md:px-4 md:py-3">{{$c -> date_taken}}</td>
                <td class="w-5 px-2 py-2 md:px-4 md:py-3">{{$c -> hour_taken}}</td>
                @if($c -> service == 'ss')
                <td class="w-5 px-2 py-2 md:px-4 md:py-3">Servicio social</td>
                @else
                <td class="w-5 px-2 py-2 md:px-4 md:py-3">Residencias</td>
                @endif
                <td class="w-5 px-2 py-2 md:px-2 md:py-3">
                    <a class="bg-red-700 ring-red-500 active:bg-red-500 active:ring-red-700 text-white ring-2 ring-opacity-50 rounded-full py-1 md:px-4 place-self-center"
                        href="{{route('log.del',$c -> id)}}">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
@section('footer')
<div class="container">
    {{ $citas->links() }}
</div>
@endsection
