<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <body class="min-h-screen bg-gradient-to-r from-slate-800 to-slate-900">
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
    
</html>
