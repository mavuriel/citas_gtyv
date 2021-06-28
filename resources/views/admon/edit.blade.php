<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tailwind CSS --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- Datepicker --}}
    <script src="/js/jquery.js"></script>
    <link href="/css/default.css" rel="stylesheet">
    <link href="/css/default.date.css" rel="stylesheet">
    <script src="/js/picker.js"></script>
    <script src="/js/picker.date.js"></script>
    <script src="/js/es_ES.js"></script>
    <script src="{{asset('js/dateformat.js')}}" defer></script>
    <title>Modificacion de cita</title>
</head>

<body>
    <main class="contcard">
        {{-- TODO: Ningun cambio fue realizado --}}
        {{-- TODO: mensaje sobre horas no disponibles --}}
        {{-- Mensaje sobre cambios realizados con exito --}}
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
                <label class="fontlabel" for="nombre">Nombre</label>
                <input class="mininput" type="text" name="nombrea" id="nombre" value="{{old('nombrea',$info-> name)}}">
                @error('nombrea')
                <p>{{$message}}</p>
                @enderror
                <label class="fontlabel" for="control">Numero de control</label>
                <input class="mininput" type="text" name="ncontrola" id="control"
                    value="{{old('ncontrola',$info-> n_control)}}">
                @error('ncontrola')
                <p>{{$message}}</p>
                @enderror
                <label class="fontlabel" for="fecha">Fecha de la cita</label>
                <input class="mininput" id="fecha" class="datepicker" autocomplete="off"
                    placeholder="Selecciona una fecha" name="afecha" value="{{old('afecha',$info-> date_taken)}}">
                @error('afecha')
                <p>{{$message}}</p>
                @enderror
                {{-- TODO: verificar las horas libres --}}
                <label class="fontlabel" for="hora">Hora de la cita</label>
                <input class="mininput" type="time" name="ahora" id="hora" value="{{old('ahora',$info-> hour_taken)}}">
                @error('ahora')
                <p>{{$message}}</p>
                @enderror
                <label class="fontlabel" for="serv">Servicio</label>
                <select class="mininput" name="servicea">
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
