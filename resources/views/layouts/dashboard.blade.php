<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <style>
        .theme-button {
            display: none;
        }

    </style>
    @yield('style')
</head>

<body @yield('body-id') @yield('body-class')>
    
    @include('inc.dashboard.navbar')

    
    @include('inc.dashboard.side-bar')

    @yield('main')


    {{-- @yield('menu') --}}


    
    @yield('script')
</body>

</html>
