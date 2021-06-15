@extends('layouts.app')

@section('title','GTyV')

@section('opt_dep')
{{-- Map script main --}}
<script src="{{asset('js/map.js')}}" defer></script>
@endsection

@section('content')
<div class="bgtec lg:bg-left ">
    <main class="mainsm lg:grid-rows-6 ">
        {{-- TODO: Ver el video layout para cambiarlo si no dejalo asi --}}
        <div class="relative filter blur bg-transparent row-start-2 ">
            <h1 class="tltg absolute lg:text-5xl lg:uppercase lg:tracking-widest">
                Gestión Tecnológica y Vinculación
            </h1>
        </div>
        <div class="ordcite lg:row-start-4">
            <a href="{{route('inicio.estudiante')}}" class="btncite ">Agenda tu cita</a>
        </div>
        <div class="tbhr lg:row-start-6">
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
    <div class="ftcont lg:grid-rows-1 ">
        <div class="addrcont lg:col-span-2 ">
            <address class="addr md:mx-12 md:tracking-wider md:text-center lg:mx-0">
                Tecnológico Nacional de México
                | Campus Veracruz
                | Calz. Miguel Ángel de Quevedo 2779
                | Col. Formando Hogar, Veracruz, Ver.
                | MÉXICO CP 91897
            </address>
        </div>
        <div id="map" class="map lg:w-full lg:col-span-2 lg:mt-2 ">
        </div>
        <div class="social lg:w-full lg:col-span-2 ">
            <p>Comunícate con nosotros</p>
        </div>
        <div class="social lg:w-full lg:col-span-2 ">
            <a href="https://www.facebook.com/ITVRP"><i class="fab fa-facebook"></i></a>
            <a href="mailto:residenciasprofesionales@itver.edu.mx"><i class="fas fa-at"></i></a>
        </div>
        <div class="info w-auto lg:w-full lg:col-span-2 ">
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
