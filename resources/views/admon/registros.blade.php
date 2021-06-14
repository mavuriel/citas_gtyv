@extends('layouts.app')

@section('title','Registros')

@section('content')
{{-- TODO: mejorar las notificaciones para que desaparezcan --}}
@if(Session::has('del_item'))
<div
    class="font-mono text-center text-yellow-600 bg-yellow-400 bg-opacity-40   m-6 p-4 border border-yellow-600 rounded-md leading-tight transition duration-300 ">
    <p>{{Session::get('del_item')}}</p>
</div>
@endif
<main class="container mx-auto min-h-80 grid grid-rows-1 items-center bg-gray-200">
    {{-- Modo movil --}}
    <div class="md:hidden grid grid-flow-row gap-2 mx-4 min-h-full ">
        <div class=" flex items-center justify-center">
            <h1 class="text-center tracking-wider font-bold text-2xl text-gray-700">Citas registradas</h1>
        </div>
        @foreach ($citas as $cita)
        <div class="bg-white rounded-lg shadow-2xl px-2 py-1 my-auto">
            <table class="w-full">
                <tr class="text-center">
                    <td class="w-1/3">
                        <div class="bg-bluet text-white-light font-light tracking-wide rounded-full px-1.5 py-1">
                            No. control
                        </div>
                    </td>
                    <td class="font-mono w-1/3 py-1">
                        <p class="mx-5">{{$cita -> n_control}}</p>
                    </td>
                    {{-- Boton detalles --}}
                    <td class="justify-center">
                        <a class="bg-blue-600 ring-blue-500 active:bg-blue-500 active:ring-blue-700 rounded-full ring-2  ring-opacity-50 py-1 px-5 text-white"
                            href="{{route('log.id', $cita-> id)}}">
                            <i class="fas fa-info"></i>
                        </a>
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="w-1/3">
                        <div class="bg-bluet text-white-light font-light tracking-wide rounded-full px-1.5 py-1">
                            Hora
                        </div>
                    </td>
                    <td class="font-mono w-1/3 py-1">
                        <p>{{$cita -> hour_taken}}</p>
                    </td>
                    {{-- Boton editar --}}
                    <td class="w-1/3">
                        <a class="bg-yellow-500 ring-yellow-500  active:bg-yellow-600 active:ring-yellow-700 rounded-full ring-2 ring-opacity-50 py-1 px-3.5 text-white"
                            href="{{route('log.edit', $cita-> id)}}">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="w-30">
                        <div class="bg-bluet text-white-light font-light tracking-wide rounded-full px-1.5 py-1">
                            Dia
                        </div>
                    </td>
                    <td class="font-mono w-50 py-1">
                        <p>{{$cita -> date_taken}}</p>
                    </td>
                    {{-- Boton eliminar --}}
                    <td class="w-20">
                        <a class="bg-red-700 ring-red-500 active:bg-red-500 active:ring-red-700 text-white ring-2 ring-opacity-50 rounded-full py-1 px-4 place-self-center"
                            href="{{route('log.del',$cita-> id)}}">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        @endforeach
    </div>

    {{-- Modo escritorio --}}
    <table class="hidden md:table">
        <thead>
            <tr>
                <th colspan="7">Citas registradas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ID</td>
                <td>DIA</td>
                <td>HORA</td>
                <td>NO. CONTROL</td>
                <td>NOMBRE</td>
                <td>ASIGNADO A</td>
                <td>CREADO</td>
                <td>ACCIONES</td>
            </tr>
            @foreach ($citas as $cita )
            <tr>
                <td>{{$cita -> id}}</td>
                <td>{{$cita -> date_taken}}</td>
                <td>{{$cita -> hour_taken}}</td>
                <td>{{$cita -> n_control}}</td>
                <td>{{$cita -> name}}</td>
                <td>{{$cita -> asigned_to}}</td>
                <td>{{$cita -> created_at}}</td>
                <td>Eliminar</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</main>
@endsection

@section('footer')
{{-- Ubicacion del archivo para la modificacion de estilos de la barra paginacion:
    resources/views/vendor/pagination/tailwind.blade.php--}}
{{ $citas->links() }}
@endsection
