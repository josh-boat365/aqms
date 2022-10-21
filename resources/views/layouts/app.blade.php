<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An Alumni Tracer Portal (ATP) Designed For Engaging in Surveys at Accra Technical University. Developed for Graduate Evaluation and Quality Assurance. The ATP seeks to learn about the extent to which the educational experience at Accra Technical University (ATU) has contributed to the career developments of its alumni. In particular, studies conducted through the ATP aim at determining the impact of training received at ATU on work placement and career progression of graduates. Your feedback, processed confidentially, will inform institutional policy on improving academic programmes and practical training, for quality service delivery to current students, prospective admissions, and industry.">
    <meta name="robots" content="noindex,nofollow">
    <title>Alumni Tracer Portal (ATP) | Accra Technical University (ATU)</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/profiles/profile-icon-atu.png') }}">

    <style>
        .theme-button {
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
