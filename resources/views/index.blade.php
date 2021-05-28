@extends('layouts.plantilla')

@section('title','GTyV')

@section('opt-style')
.imgtec{
background-image: url({{asset('assets/img/frente.webp')}});
}
@endsection

@section('head')
<nav class="bg-blue-900 min-h-15">
    <ul class="grid grid-cols-4">
        <li>Icono del tec</li>
        <li>TecNM campus Veracruz</li>
        <li>incia sesion</li>
        <li>registrate</li>
    </ul>
</nav>
@endsection

@section('content')
<div class="imgtec min-h-85 bg-center bg-cover">
    <main class="container ">
        <h2>Gestion Tecnologica y Vinculacion</h2>

        <a href="https://www.google.com">Agenda tu cita</a>

        <div class="grid grid-cols-2">
            <div>
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
        </div>
    </main>
</div>
@endsection

@section('footer')
<div class="bg-gray-800 min-h-1/2">
    <div class="container grid grid-cols-4 ">
        <div class="col-span-2">
            <address>
                Tecnológico Nacional de México campus Veracruz <br>
                Calz. Miguel Angel de Quevedo 2779 <br>
                Col. Formando Hogar, Veracruz, Ver. MEXICO CP 91897 <br>
                Falta numero y correo de gestion
            </address>
        </div>
        <div class="col-span-2">
            <p>Aqui va el mapa de google</p>
        </div>
        <div class="col-span-4">
            <p>Aqui van las redes sociales</p>
        </div>
        <div class="col-span-4">
            <p>Aqui va mi link de github</p>
        </div>
    </div>
</div>
@endsection
