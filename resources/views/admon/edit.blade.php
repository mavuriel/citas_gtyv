<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificacion de cita</title>
</head>

<body>
    <main>
        <h1>Cita numero {{$info-> id}}</h1>

        <label for="nombre">Nombre del estudiante</label>
        <input id="nombre" value="{{$info-> name}}">
        <label for="control">Numero de control</label>
        <input id="control" value="{{$info-> n_control}}">
        <label for="fecha">Fecha de la cita</label>
        <input id="fecha" value="{{$info-> date_taken}}">
        <label for="hora">Hora de la cita</label>
        <input id="hora" value="{{$info-> hour_taken}}">
        <label for="serv">Servicio</label>

        <select name="service">
            @if ($info-> service == 'rd')
            <option value="{{$info-> service}}" selected>Residencias</option>
            <option value="ss">Servicio Social</option>
            @else
            <option value="{{$info-> service}}" selected>Servicio Social</option>
            <option value="rd">Residencias</option>
            @endif
        </select>
        <a href="{{route('log.citas')}}">Regresar</a>
    </main>
</body>

</html>
