@extends('layouts.app')

@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}">
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-float-label.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <style>
        #register-admin-btn:hover{
        cursor: pointer;
    }
    </style>
@endsection

@section('body-class') class="background show-spinner no-footer" @endsection

@section('body')
    <div class="fixed-background"></div>
    <div class="container col-12 position-absolute" style="z-index: 200">
        {{-- <a href="{{ route('register') }}" class="ml-auto float-right px-3 py-1 m-3 text-white">Register</a> --}}
    </div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card mt-3 mb-3">
                        <div class="position-relative image-side">
                            <p class="text-white h2">WELCOME TO ATU TRACER</p>
                            <p class="white mb-0">Dear Alumnus:</p><br>

                            <p class="white">Thank you for the intended participation.</p>

                            <p class="text-wrap white">
                                The Tracer Study seeks to learn about the extent to which the educational experience at Accra Technical University (ATU) has contributed to the career developments of its alumni.
                            </p>

                            <p class="text-wrap white">
                                In particular, the study aims at determining, from your perspective, the impact of the training received on work placement and career progression.
                            </p>

                            <p class="text-wrap white">
                                Your feedback, processed confidentially, will inform institutional policy on improving academic programmes and practical training, for quality service delivery to current students, prospective admissions, and industry.
                            </p>

                            <p class="white">We look forward to receiving your responses.</p>
                            {{-- <form action="{{route('register')}}">@csrf @method('put') <input class="white font-weight-bold h5" type="submit" value="Register"></form> --}}
                            <span id="register-admin-btn" class="white btn btn-primary font-weight-bold h5">Register</span>
                        </p>
                        </div>
                        <div class="form-side position-relative">
                            @if (session('error'))
                                <div class="alert alert-danger position-absolute"
                                    style="top: 5%; left: 50%; transform: translateX(-50%)">
                                    {{ session('error') }}
                                </div>
                            @endif


                            <div style="height: 95px; position: relative; top: -3rem;"></div>
                            <div class="atu-icon" style="position: relative; top: -3rem;">
                                <a href="">
                                    <img src="/img/custom/atulogo.png" height="15%" width="45%" alt="">
                                </a>
                            </div>
                            <h5 class="header-title mb-3" style="margin-top: 0.5rem">Admin</h5>

                            {{-- <a href="{{route('login')}}"><span class="logo-single"></span></a> --}}
                            <form class="tooltip-right-bottom" novalidate method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group has-float-label"><input class="" value="{{ old('email') }}"
                                        class="form-control" name="email" required>
                                    <span>E-mail</span>
                                    @error('email')
                                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group has-float-label"><input class="" name="password" class="form-control"
                                        type="password" required>
                                    <span>Password</span>
                                    @error('password')
                                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a  href="{{ route('forgot-password') }}">Forgotten password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Log in</button>
                            </form>
                            <form action="{{route('register')}}" method="POST" id="register-admin-form">
                                @csrf
                                @method('put')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{asset('js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/dore.script.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>

    <script>
        $(function () {
            console.log('Hi');
            $('#register-admin-btn').click(function () {
                $('#register-admin-form').submit()
            })
        })
    </script>
@endsection
