<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="min-h-screen bg-gradient-to-r from-slate-800 to-slate-900">
        <div class="">
            <!-- Page Heading  en caso de que este logeado-->
            @include('layouts/navigation')
            <!-- Page Content -->
            <main>
                {{ $slot }}
                
                @livewireScripts
            </main>
        </div>

    </body>
</html>
