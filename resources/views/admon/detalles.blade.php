<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de cita</title>
</head>

<body>

    <h1>Cita numero {{$info-> id}}</h1>

    <p>Nombre del estudiante: {{$info-> name}}</p>
    <p>Numero de control: {{$info-> n_control}}</p>
    <p>Fecha de la cita: {{$info-> date_taken}}</p>
    <p>Hora de la cita: {{$info-> hour_taken}}</p>
    @if($info-> service == 'rd')
    <p>Servicio: Residencias</p>
    @else
    <p>Servicio: Servicio Social</p>
    @endif

    <a href="{{route('log.citas')}}">Regresar</a>
</body>

</html>
