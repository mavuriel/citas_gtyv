@props(['active'])

@php
$classes = ($active ?? false)
/* Cuando la pestaña esta activa */
? 'block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-white bg-indigo-50
focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition'
/* Cuando la pestaña no esta activa */
: 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-300 hover:text-gray-800
hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300
transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
