<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}">
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/component-custom-switch.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dore.light.bluenavy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/jquery.contextMenu.min.css') }}">
    <style>
        .theme-button {
            display: none;
        }

    </style>
    @yield('style')
</head>

<body @yield('body-id') @yield('body-class')>
    {{-- @yield('nav') --}}
    @include('inc.dashboard.navbar')

    {{-- @yield('side-bar') --}}
    @include('inc.dashboard.side-bar')

    @yield('main')


    {{-- @yield('menu') --}}


    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.contextMenu.min.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    
    @yield('script')
</body>

</html>
