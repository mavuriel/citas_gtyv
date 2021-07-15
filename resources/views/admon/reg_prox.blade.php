@extends('layouts.app')

@section('title','Registros proximos')

@section('content')

@if(Session::has('del_item'))
<div class="dangeralert">
    <p>{{Session::get('del_item')}}</p>
</div>
@endif

<main class="container mx-auto md:px-2 min-h-80 grid grid-rows-1 items-center bg-gray-200 md:py-4">

    {{-- Modo movil --}}
    <div class="md:hidden contcards">
        <div class="conth1reg">
            <h1 class="h1log">Proximas citas</h1>
        </div>
        @foreach ($proxm as $cita)
        <div class="conteachcard">
            <table class="w-full">
                <tr class="text-center">
                    <td class="w-1/3">
                        <div class="bubblebg">
                            No. control
                        </div>
                    </td>
                    <td class="font-mono w-1/3 py-1">
                        <p class="mx-5">{{$cita -> n_control}}</p>
                    </td>
                    {{-- Boton detalles --}}
                    <td class="justify-center">
                        <a class="detailsbtn" href="{{route('log.id', $cita-> id)}}">
                            <i class="fas fa-info"></i>
                        </a>
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="w-1/3">
                        <div class="bubblebg">
                            Hora
                        </div>
                    </td>
                    <td class="font-mono w-1/3 py-1">
                        <p>{{$cita -> hour_taken}}</p>
                    </td>
                    {{-- Boton editar --}}
                    {{-- No se si se va a quedar xD --}}
                    <td class="w-1/3">
                        <a class="bg-yellow-500 ring-yellow-500  active:bg-yellow-600 active:ring-yellow-700 rounded-full ring-2 ring-opacity-50 py-1 px-3.5 text-white"
                            href="{{route('log.edit', $cita-> id)}}">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="w-30">
                        <div class="bubblebg">
                            Dia
                        </div>
                    </td>
                    <td class="font-mono w-50 py-1">
                        <p>{{$cita -> date_taken}}</p>
                    </td>
                    {{-- Boton eliminar --}}
                    <td class="w-20">
                        <a class="deletebtn" href="{{route('log.del',$cita-> id)}}">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        @endforeach
    </div>

    {{-- Modo escritorio --}}
    <table class="hidden md:table rounded-t-lg w-5/6 mx-auto bg-bluet text-white">
        <thead>
            <tr class="text-center border-b-2 border-gray-300">
                <th class="h-2 uppercase p-4" colspan="7">Proximas citas</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center border-b-2 border-gray-600">
                <td class="w-10 px-4 py-3">CITA</td>
                <td class="w-10 px-4 py-3">DIA</td>
                <td class="w-10 px-4 py-3">HORA</td>
                <td class="w-20 px-4 py-3">NO. CONTROL</td>
                <td class="w-20 px-4 py-3">NOMBRE</td>
                <td class="w-10 px-4 py-3">CREADO</td>
                <td class="w-10 px-2 py-3"></td>
            </tr>
            @foreach ($prox as $c)
            <tr class="text-center border-b-2 border-gray-600">
                <td class="px-4 py-3">
                    {{$c -> id}}
                </td>
                <td class="px-4 py-3">
                    {{$c-> date_taken}}
                </td>
                <td class="px-4 py-3">
                    {{$c-> hour_taken}}
                </td>
                <td class="px-4 py-3">
                    {{$c -> n_control}}
                </td>
                <td class="px-4 py-3">
                    {{$c -> name}}
                </td>
                <td class="px-4 py-3">
                    {{$c -> created_at}}
                </td>
                <td class="px-2 py-3">
                    <a class="deletebtn" href="{{route('log.del',$c-> id)}}">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mx-auto pt-3">
        <a class="btncite" href="{{route('log.all')}}">Ver todas las citas</a>
    </div>
</main>

@endsection

@section('footer')
<div class="container md:hidden">
    {{ $proxm->links() }}
</div>

<div class="container hidden md:table">
    {{ $prox->links() }}
</div>
@endsection
