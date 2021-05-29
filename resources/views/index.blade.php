@extends('layouts.plantilla')

@section('title','GTyV')

@section('opt-style')
.map{
height: 300px;
width: 100%;
}
@endsection

@section('opt_dep')
{{-- Map script main --}}
<script src="{{asset('js/map.js')}}" defer></script>
@endsection

@section('header')
<nav class="bg-blue-900 min-h-10 py-4">
    <ul class="grid grid-cols-4 ">
        <li class="bg-logo bg-center bg-auto bg-no-repeat"></li>
        <li>TecNM campus Veracruz</li>
        <li>incia sesion</li>
        <li>registrate</li>
    </ul>
</nav>
@endsection

@section('content')

{{-- TODO: editar la foto para tamaño pequeño ya que se ve mal
    -revisalo cuando lo cambies- --}}
<div class="bg-tec min-h-1/2 bg-center bg-cover">
    <main class="container grid gap-y-4 ">
        <div class="bg-red-400 ">
            <h2>Gestion Tecnologica y Vinculacion</h2>
        </div>
        <div class="bg-red-400">
            <a href="https://www.google.com">Agenda tu cita</a>
        </div>
        <div class="bg-red-400 ">
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
<div class="bg-grayF min-h-40">
    <div class="container grid grid-cols-1 md:grid-cols-4 gap-2 ">
        <div class="bg-white md:col-span-2 ">
            <address>
                Tecnológico Nacional de México campus Veracruz <br>
                Calz. Miguel Angel de Quevedo 2779 <br>
                Col. Formando Hogar, Veracruz, Ver. MEXICO CP 91897 <br>
                Falta numero y correo de gestion
            </address>
        </div>
        <div id="map" class="map md:col-span-2 ">
        </div>
        <div class="bg-white md:col-span-4 ">
            <p>Aqui van las redes sociales</p>
        </div>
        <div class="bg-white md:col-span-4 ">
            <p>Aqui va mi link de github</p>
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
