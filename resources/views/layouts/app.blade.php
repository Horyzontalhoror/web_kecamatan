<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Flowbite and Laravel Starter') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

        {{-- css --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/9149d1efb5.js" crossorigin="anonymous"></script>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- orgchart --}}
        <script src="https://balkan.app/js/OrgChart.js"></script>

    <body class="bg-[url(/img/mountains.jpg)] bg-fixed>
        @include('partials.head')
        @include('partials.navbar')
        @yield('content')
        @include('partials.footer')

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </body>
</html>
