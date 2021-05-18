@extends('layouts.plantilla')

@section('title','Registros')

@section('content')
<h1>Hola esta es la tabla de todos los registros de citas</h1>

<table>
    <thead>
        <tr>
            <th colspan="6">Citas registradas</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ID</td>
            <td>DIA</td>
            <td>HORA</td>
            <td>NO. CONTROL</td>
            <td>NOMBRE</td>
            <td>ASIGNADO A</td>
            <td>CREADO</td>
            <td>ELIMINAR</td>
        </tr>
        @foreach ($citas as $cita )
        <tr>
            <td>{{$cita -> id}}</td>
            <td>{{$cita -> date_taken}}</td>
            <td>{{$cita -> hour_taken}}</td>
            <td>{{$cita -> n_control}}</td>
            <td>{{$cita -> name}}</td>
            <td>{{$cita -> asigned_to}}</td>
            <td>{{$cita -> created_at}}</td>
            <td>Eliminar</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $citas->links() }}
@endsection
