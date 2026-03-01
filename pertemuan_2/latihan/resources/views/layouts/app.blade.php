<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-br from-slate-100 to-blue-100 min-h-screen text-gray-800">

    <div class="min-h-screen">

        
        @include('layouts.navigation')

        
        <main class="max-w-5xl mx-auto px-6 py-10">
    <div class="max-w-5xl mx-auto px-4">
        @yield('content')
    </div>
</main>

    </div>

</body>