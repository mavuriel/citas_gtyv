<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-base text-gray-600">
            <p>
                Si has olvidado tu contraseña por favor envía un correo electrónico a la siguiente
                <a href="mailto:residenciasprofesionales@itver.edu.mx" class="text-blue-600 underline break-words">
                    dirección de correo electronico
                </a>
                con el asunto
                <strong class="font-bold">
                    "restablecer contraseña"
                </strong>
                y en el cuerpo tú
                <strong class="font-bold">
                    "número de control"
                </strong>
                , una vez que haya sido restablecido recibirás un correo de confirmación.
            </p>


        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                href="/">
                Regresar
            </a>
        </div>

        {{-- @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="Correo electronico" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    Enviar link para restablecer
                </x-jet-button>
            </div>
        </form> --}}
    </x-jet-authentication-card>
</x-guest-layout>
