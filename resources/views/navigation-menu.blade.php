{{-- Array para los links de la barra de navegacion
    [
    'name' => 'prueba 2',
    'route' => '#' /* route('#') */,/* nombre del route */
    'active' => false/* request()->routeIs('#') *//* nombre del route */
    ]
--}}
@php
$nav_links = [
[
'name' => 'Estudiante',
'route' => route('inicio.estudiante'),
'active' => request()->routeIs('inicio.estudiante')
],[
'name' => 'Citas',
'route' => route('log.citas'),
'active' => request()->routeIs('log.citas')
],
];
@endphp

{{-- Todo esto es renderizado desde app.blade.php
    en la orden de @livewire('navigation-menu') --}}
<nav x-data="{ open: false }" class="bg-bluet border-b border-gray-800 shadow min-h-10 md:py-4">
    <!-- Primary Navigation Menu -->
    {{-- Barra de navegacion en vista de escritorio --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center ">
                    <a href="{{ route('index') }}">
                        {{-- Componente de jet ubicado en vendor/laravel/jetstream/resources/components/aplication-mark.blade.php --}}
                        <x-jet-application-mark class="block" />
                        {{-- LOGO class="bg-logo bg-center bg-auto bg-no-repeat" --}}
                    </a>
                </div>

                {{-- Links de la barra de navegacion de escritorio --}}
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{-- Ciclo para crear diferentes links en la barra usando el array del principio --}}
                    @auth
                    @foreach ($nav_links as $n )
                    <x-jet-nav-link href="{{ $n['route'] }}" :active="$n['active']">
                        {{ $n['name'] }}
                    </x-jet-nav-link>
                    @endforeach
                    @endauth
                    {{-- ubicacion del archivo original en vendor/laravel/jetstream/resources/components/nav-link.blade.php --}}
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                {{-- Esto maneja los links del boton de usuario --}}
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    {{-- Estas directivas de autenticacion evitan que de error cuando no se encuentre logeado un usuario --}}
                    @auth
                    <x-jet-dropdown align="left" width="50">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{-- {{ __('Manage Account') }} --}}
                                Panel
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{-- {{ __('Profile') }} --}}
                                Perfil
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{-- {{ __('Log Out') }} --}}
                                    Cerrar sesión
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-white hover:underline">Inicia sesión</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-white hover:underline">Registrate</a>
                    @endauth
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- Barra de navegacion de celular --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden ">
        <div class="pt-2 pb-3 space-y-1">
            {{-- Ciclo para crear diferentes links en la barra usando el array del principio --}}
            @auth
            @foreach ($nav_links as $n )
            <x-jet-responsive-nav-link href="{{ $n['route'] }}" :active="$n['active']">
                {{ $n['name'] }}
            </x-jet-responsive-nav-link>
            @endforeach
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="flex-shrink-0 mr-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                @endif

                <div>
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                    :active="request()->routeIs('profile.show')">
                    {{-- {{ __('Profile') }} --}}
                    Perfil
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                    :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{-- {{ __('Log Out') }} --}}
                        Cerrar sesión
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="border-t border-gray-200"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                    :active="request()->routeIs('teams.show')">
                    {{ __('Team Settings') }}
                </x-jet-responsive-nav-link>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <x-jet-responsive-nav-link href="{{ route('teams.create') }}"
                    :active="request()->routeIs('teams.create')">
                    {{ __('Create New Team') }}
                </x-jet-responsive-nav-link>
                @endcan

                <div class="border-t border-gray-200"></div>

                <!-- Team Switcher -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                @endforeach
                @endif
            </div>
        </div>
        @else
        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
            Login
        </x-jet-responsive-nav-link>
        <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
            Register
        </x-jet-responsive-nav-link>
        @endauth
    </div>
</nav>
