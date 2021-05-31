@extends('layouts.app')

@section('title','GTyV')

@section('opt_dep')
{{-- Map script main --}}
<script src="{{asset('js/map.js')}}" defer></script>
@endsection

@section('content')
{{--TODO: modificar la barra de navegacion con otros colores y falta el logo del tec
    --}}
{{-- TODO: editar la foto para tamaño pequeño ya que se ve mal
    -revisalo cuando lo cambies- --}}
<div class="bgtec md:min-h-1/2 ">
    <main class="mainsm ">
        <div class=" row-start-2 ">
            <h1 class="tltg ">
                Gestión Tecnológica y Vinculación
            </h1>
        </div>
        <div class="ordcite ">
            <a href="{{route('inicio.estudiante')}}" class="btncite ">Agenda tu cita</a>
        </div>
        <div class="tbhr ">
            <table>
                <caption>Horario de atención</caption>
                <tr>
                    <td>Lunes a Viernes</td>
                </tr>
                <tr>
                    <td>10:00 - 15:00</td>
                </tr>
            </table>
        </div>
    </main>
</div>
@endsection

@section('footer')
<div class="bg-grayF min-h-1/4">
    <div class="ftcont md:grid-cols-4 ">
        <div class="addrcont md:col-span-2 ">
            {{-- <address class="font-serif leading-tight text-lg  text-white text-opacity-75 p-2">
                Tecnológico Nacional de México <br>
                Campus Veracruz <br>
                Calz. Miguel Ángel de Quevedo 2779 <br>
                Col. Formando Hogar, Veracruz, Ver. <br>
                MÉXICO CP 91897 <br>
            </address> --}}
            <address class="addr">
                Tecnológico Nacional de México
                | Campus Veracruz
                | Calz. Miguel Ángel de Quevedo 2779
                | Col. Formando Hogar, Veracruz, Ver.
                | MÉXICO CP 91897
            </address>
        </div>
        <div id="map" class="map md:w-full md:col-span-2 md:mt-2 ">
        </div>
        <div class="social md:w-full mx-2 md:col-span-4 ">
            <p>Comunícate con nosotros</p>
        </div>
        <div class="social mx-2 md:w-full md:col-span-4 ">
            <a href="https://www.facebook.com/ITVRP"><i class="fab fa-facebook"></i></a>
            <a href="mailto:residenciasprofesionales@itver.edu.mx"><i class="fas fa-at"></i></a>
        </div>
        <div class="info w-auto md:w-full md:col-span-4 ">
            <p>Hecho en México por <a href="https://github.com/mavuriel"><i class="fab fa-github"></i></a></p>
        </div>
    </div>
</div>
@endsection

@section('others')
{{-- Map script --}}
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcExuTvIVcwcRwrKucwwauCSweROdKlZs&callback=initMap">
</script>
@endsection
