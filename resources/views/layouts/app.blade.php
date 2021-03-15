<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JSUX.fun') }}</title>

    <link rel="preload" href="/fonts/Montserrat-Medium.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/fonts/Montserrat-Regular.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/fonts/Montserrat-semibold.ttf" as="font" type="font/ttf" crossorigin>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/css/uikit.min.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.16/dist/js/uikit-icons.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    @livewireStyles
    @livewireScripts
</head>
<body>
    <div id="app">
        @include('components.navbar.navbar')

        <main class="uk-container uk-flex uk-flex-center uk-margin-bottom">
            @yield('content')
        </main>

    </div>
</body>
</html>
