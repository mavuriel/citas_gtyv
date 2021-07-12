<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/be43174b2c.js" crossorigin="anonymous"></script>
    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="theme-color" content="#ffffff">

    @if (request()->routeIs('profile.show'))
    <title>Panel de cuenta</title>
    @else
    <title>@yield('title')</title>
    @endif


    <style type="text/css">
        @yield('opt-style');
    </style>

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    @yield('opt_dep')
</head>

<body class="font-sans bg-gray-200">
    <header>
        {{-- Componente de livewire ubicado en:
                resources/views/navigation-menu.blade.php --}}
        @livewire('navigation-menu')
    </header>


    {{--
    Condicional que checa si se encuentra en la ruta que administra
    la cuenta del usuario para mostrarla es necesario agregar "{{el componente de blade}}"
    el nombre de la ruta a la cual se compara se encuentra en el archivo
    navigation-menu.blade.php en la seccion "Account Management"
    --}}
    @if (request()->routeIs('profile.show'))
    {{-- Este componente de blade se encuentra en
        resources/views/profile/show.blade.php
        yo le cambie el nombre y le puse prueba
        *funciona en movil pero no se si sea responsivo totalmente*
    --}}
    {{$prueba}}
    @else
    @yield('content')
    @endif

    <footer>
        @yield('footer')
    </footer>

    <script>
        @yield('script-body')
    </script>

    @yield('others')
    @livewireScripts
</body>

</html>
