<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>{{ config('app.name', 'Refaccionaria ALA') }}</title>

        <!-- Fonts -->
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    @if(request()->routeIs('dashboard'))
    <body class="min-h-screen bg-white">
        <div class="">
            <!-- Page Heading  en caso de que este logeado-->
            @if(request()->routeIs('dashboard'))
                <!-- no incluir el header -->
            @else
                @include('layouts/navigation')
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    @livewireScripts
    </body>
    @else
    <body class="flex flex-col min-h-[100dvh] bg-gray-900">
        <div class="">
            <!-- Page Heading  en caso de que este logeado-->
            @if(request()->routeIs('dashboard'))
                <!-- no incluir el header -->
            @else
                @include('layouts/navigation')
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    @livewireScripts
    </body>
    @endif
    @if(request()->routeIs('dashboard'))

    @else
    <footer class="bg-gray-900 text-white py-6 px-6 md:px-8">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
        <p>&copy; 2024 Autopartes ALA. Todos los derechos reservados.</p>
        <nav class="flex items-center space-x-6 mt-4 md:mt-0">
            <a href="#" class="hover:text-gray-700">Terminos de servicio</a>
            <a href="#" class="hover:text-gray-700">Politicas de privacidad</a>
            <a href="#" class="hover:text-gray-700">Contactanos</a>
        </nav>
    </div>
    @endif
</footer>

</html>
