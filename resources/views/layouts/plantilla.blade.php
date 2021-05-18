<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Full calendar --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/locales-all.js"></script>
    <script src="{{ asset('js/calendar.js') }}" defer></script>
    {{--     <script src="{{asset('js/modal.js')}}" defer></script> --}}
    <title>@yield('title')</title>
</head>

<body>
    @yield('content')
</body>




</html>
