<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <link rel="icon" type="image/x-icon" href="{{ asset('images/Lambang_TNI_AD.png') }}">
        <link rel="stylesheet" href="{{ asset('css/tni.css') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#e8e4de]">
        @include('layouts.tni_auth_navbar')
        <div class="flex items-center min-h-screen">
            {{ $slot }}
        </div>
    </body>
</html>
