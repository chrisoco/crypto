<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Crypto') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.0/css/all.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/special-button.css') }}">

    <style>
        @font-face {
            font-family: Dancing Script;
            src: url('{{ asset('/fonts/Dancing Script.ttf') }}');
        }
    </style>

    @yield('custom-style')

</head>
<body>
    <div id="app">

        @include('layouts.navbar')

        <main class="container-fluid">
            @yield('content')
        </main>

        <footer class="footer bg-primary d-flex justify-content-center">
            ©2022 C.O'Connor
        </footer>

    </div>
</body>
</html>
