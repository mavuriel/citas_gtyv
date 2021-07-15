@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
    class="flex items-center justify-between min-h-10 bg-gray-200">

    {{-- Botones para pantalla movil --}}
    <div class="flex justify-between flex-1 sm:hidden mx-6 px-1 pb-1">
        {{-- Cuando no tiene paginas el boton de previo se bloquea --}}
        @if ($paginator->onFirstPage())
        <span
            class="relative inline-flex items-center px-4 py-1 text-sm font-medium text-gray-500 bg-gray-200 ring ring-gray-400 cursor-not-allowed leading-5 rounded-md">
            Anterior
        </span>
        @else
        {{-- Si tiene paginas anteriores se activa el boton de previo --}}
        <a href="{{ $paginator->previousPageUrl() }}"
            class="relative inline-flex items-center px-4 py-1 text-sm font-medium leading-5 rounded-md text-white bg-bluet active:bg-blue-600 active:ring-blue-700 ring ring-blue-600">
            Anterior
        </a>
        @endif

        {{-- Si tiene mas paginas se activa el boton de siguiente --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="relative inline-flex items-center px-4 py-1 text-sm font-medium leading-5 rounded-md text-white bg-bluet active:bg-blue-600 active:ring-blue-700 ring ring-blue-600">
            Siguiente
        </a>
        {{-- Si no tiene mas paginas se bloquea el boton de siguiente --}}
        @else
        <span
            class="relative inline-flex items-center px-4 py-1 text-sm font-medium text-gray-500 bg-gray-200 ring ring-gray-400 cursor-not-allowed leading-5 rounded-md">
            Siguiente
        </span>
        @endif
    </div>

    {{-- Botones para pantalla de escritorio --}}
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between mx-auto">
        {{-- Texto donde muestra el numero de resultados --}}
        <div>
            <p class="text-sm text-gray-700 leading-5">
                Mostrando
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                a
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                de
                <span class="font-medium">{{ $paginator->total() }}</span>
                resultados
            </p>
        </div>
        {{-- Botones --}}
        <div>
            <span class="relative z-0 inline-flex shadow-sm rounded-md">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                {{-- Cuando no hay paginas anteriores - primer pagina --}}
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <span
                        class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-gray-200 border border-gray-400 cursor-not-allowed rounded-l-md leading-5"
                        aria-hidden="true">
                        Anterior
                    </span>
                </span>
                @else
                {{-- Cuando hay paginas anteriores --}}
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-white bg-bluet border border-gray-300 rounded-l-md leading-5 hover:text-gray-300 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-600 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                    aria-label="{{ __('pagination.previous') }}">
                    Anterior
                </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <span aria-disabled="true">
                    <span
                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span aria-current="page">
                    <span
                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-blue-800 border border-bluet cursor-default leading-5">{{ $page }}</span>
                </span>
                @else
                <a href="{{ $url }}"
                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                </a>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                {{-- Cuando hay mas paginas siguientes --}}
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                    class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-white bg-bluet border border-gray-300 rounded-r-md leading-5 hover:text-gray-300 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-600 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                    aria-label="{{ __('pagination.next') }}">
                    Siguiente
                </a>
                @else
                {{-- Cuando no hay mas paginas siguientes --}}
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span
                        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-gray-200 border border-gray-400 cursor-not-allowed rounded-r-md leading-5"
                        aria-hidden="true">
                        Siguiente
                    </span>
                </span>
                @endif
            </span>
        </div>
    </div>
</nav>
@endif
