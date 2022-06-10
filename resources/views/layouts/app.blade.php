<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="An Alumni Questionnaire Management System AQMS Designed For Engaging in Surveys at Accra Technical University. Developed By Joshua Nyarko Boateng and Fuad Muhammed.">
    <meta name="robots" content="noindex,nofollow">
    <title>AQMS | Alumni Questionnaire Management System - Accra Technical University</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/profiles/profile-icon-atu.png') }}">

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
