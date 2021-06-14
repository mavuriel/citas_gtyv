<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Detalles de cita</title>
</head>

<body>
    <main class="contcard">
        <h1 class="h1card">Cita #{{$info-> id}}</h1>
        <div class="bodycard">
            <p class="font-bold">Nombre:</p>
            <p class="datacard">{{$info-> name}}</p>
            <p class="font-bold">Numero de control:</p>
            <p class="datacard">{{$info-> n_control}}</p>
            <p class="font-bold">Fecha de la cita:</p>
            <p class="datacard">{{$info-> date_taken}}</p>
            <p class="font-bold">Hora de la cita:</p>
            <p class="datacard">{{$info-> hour_taken}}</p>
            <p class="font-bold">Servicio:</p>
            @if($info-> service == 'rd')
            <p class="datacard">Residencias</p>
            @else
            <p class="datacard">Servicio Social</p>
            @endif
        </div>
        <a class="returnbtn" href="{{route('log.citas')}}">Regresar</a>
    </main>
</body>

</html>
