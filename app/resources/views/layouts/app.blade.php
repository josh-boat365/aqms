<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{asset('font/iconsmind-s/css/iconsminds.css')}}">
    <link rel="stylesheet" href="{{asset('font/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.rtl.only.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/dore.dark.bluenavy.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <style>
        .theme-button{
            display: none;
        }
    </style>
    @yield('style')
</head>

<body @yield('body-id') @yield('body-class')>
    @yield('nav')

    @yield('menu')

    @yield('body')

    @yield('script')


</body>

</html>
