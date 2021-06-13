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
    <main
        class="container mx-auto bg-gray-300 min-h-screen flex flex-col justify-center items-center text-center space-y-0 p-14 font-sans ">
        <h1 class="rounded-t-lg bg-bluet min-w-full py-2 text-white-light shadow-2xl text-2xl">Cita #{{$info-> id}}</h1>
        <div class=" bg-white min-w-full p-4 shadow-2xl">
            <p class="font-bold">Nombre:</p>
            <p class="font-mono font-light tracking-wide">{{$info-> name}}</p>
            <p class="font-bold">Numero de control:</p>
            <p class="font-mono font-light tracking-wide">{{$info-> n_control}}</p>
            <p class="font-bold">Fecha de la cita:</p>
            <p class="font-mono font-light tracking-wide">{{$info-> date_taken}}</p>
            <p class="font-bold">Hora de la cita:</p>
            <p class="font-mono font-light tracking-wide">{{$info-> hour_taken}}</p>
            <p class="font-bold">Servicio:</p>
            @if($info-> service == 'rd')
            <p class="font-mono font-light tracking-wide">Residencias</p>
            @else
            <p class="font-mono font-light tracking-wide">Servicio Social</p>
            @endif
        </div>
        <a class="bg-bluet rounded-b-lg min-w-full py-2 text-white active:bg-blue-600 shadow-2xl"
            href="{{route('log.citas')}}">Regresar</a>
    </main>
</body>

</html>
