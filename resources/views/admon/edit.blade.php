<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Modificacion de cita</title>
</head>

<body>
    <main class="contcard">
        {{-- TODO: mensaje sobre horas no disponibles --}}
        {{-- TODO: mensaje sobre cambios realizados con exito --}}
        @if(Session::has('dato_act'))
        <div>
            <p>{{Session::get('dato_act')}}</p>
        </div>
        @endif

        <form action="{{route('update.estudiante',$info)}}" method="POST">
            @csrf
            <div class="h1card">
                <h1>Cita numero {{$info-> id}}</h1>
            </div>
            <div class="bodycard">
                <label for="nombre">Nombre</label>
                {{-- TODO: estilos a los input --}}
                <input class="min-w-full" type="text" name="nombrea" id="nombre" value="{{$info-> name}}">
                <label for="control">Numero de control</label>
                <input class="min-w-full" type="text" name="ncontrola" id="control" value="{{$info-> n_control}}">
                <label for="fecha">Fecha de la cita</label>
                <input class="min-w-full" type="date" name="afecha" id="fecha" value="{{$info-> date_taken}}">
                {{-- TODO: verificar las horas libres --}}
                <label for="hora">Hora de la cita</label>
                <input class="min-w-full" type="time" name="ahora" id="hora" value="{{$info-> hour_taken}}">
                <label for="serv">Servicio</label>
                <select class="min-w-full" name="servicea">
                    @if ($info-> service == 'rd')
                    <option value="{{$info-> service}}" selected>Residencias</option>
                    <option value="ss">Servicio Social</option>
                    @else
                    <option value="{{$info-> service}}" selected>Servicio Social</option>
                    <option value="rd">Residencias</option>
                    @endif
                </select>
            </div>
            <div class="contbtns">
                <a class="btnleft focus:outline-none" href="{{route('log.citas')}}">Regresar</a>
                <button type="submit" class="btnright focus:outline-none">Actualizar</button>
            </div>
        </form>
    </main>
</body>

</html>
