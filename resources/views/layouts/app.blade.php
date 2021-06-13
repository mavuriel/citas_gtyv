<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style type="text/css">
        @yield('opt-style');
    </style>

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    @yield('opt_dep')
</head>

<body class="font-sans">
    <x-jet-banner />{{-- No se que es XD --}}

    <header>
        <div class="min-h-10 bg-gray-200">
            {{-- Componente de livewire ubicado en carpeta de views
                - archivo navigation-menu.blade.php --}}
            @livewire('navigation-menu')
        </div>
    </header>

    @yield('content')

    <footer>
        @yield('footer')
    </footer>

    <script>
        @yield('script-body')
    </script>

    @yield('others')
</body>

</html>
