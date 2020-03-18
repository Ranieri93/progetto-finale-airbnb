<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BoolB&B') }}</title>




    <!-- Maps -->
    <link href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.40.1/maps/maps.css' rel='stylesheet' type='text/css'>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.40.1/maps/maps-web.min.js'></script>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('js/app.js') }}" rel="stylesheet">
</head>

<body>

    @include('layouts.partials.admin-navbar')
    <main>
        @yield('content')
    </main>

</body>

</html>
