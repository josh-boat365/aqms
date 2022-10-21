@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}">
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-float-label.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection

@section('body-class')
    class="background show-spinner no-footer"
@endsection

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
                            <p class="text-white h2">ALUMNI TRACER PORTAL</p>
                            <p class="white mb-0">Dear Alumnus:</p><br>

                            <p class="white">Welcome to the Alumni Tracer Portal (ATP).</p>

                            <p class="text-wrap white">
                                The ATP seeks to learn about the extent to which the educational experience at Accra
                                Technical University (ATU) has contributed to the career developments of its alumni.
                            </p>

                            <p class="text-wrap white">
                                In particular, studies conducted through the ATP aim at determining the impact of training
                                received at ATU on work placement and career progression of graduates.
                            </p>

                            <p class="text-wrap white">
                                Your feedback, processed confidentially, will inform institutional policy on improving
                                academic programmes and practical training, for quality service delivery to current
                                students, prospective admissions, and industry.
                            </p>

                            <p class="white">We look forward to your insights to facilitate broader stakeholder engagement.
                            </p>

                            <p class="white">ATU TRACER TEAM.</p>
                            <a href="{{ route('login') }}" class="white btn btn-primary font-weight-bold h5">Login</a>.</p>
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
                            <h5 class="header-title mb-3" style="margin-top: 0.5rem">Forgotten Password</h5>

                            {{-- <a href="{{route('login')}}"><span class="logo-single"></span></a> --}}
                            <form class="tooltip-right-bottom" novalidate method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group has-float-label"><input value="{{ old('email') }}"
                                        class="form-control" name="email" required>
                                    <span>E-mail</span>
                                    @error('email')
                                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group has-float-label"><input name="password" class="form-control"
                                        type="password" required>
                                    <span>New Password</span>
                                    @error('password')
                                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group has-float-label"><input name="password" class="form-control"
                                        type="password" required>
                                    <span>Confirm Password</span>
                                    @error('password')
                                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
@endsection
