@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{asset('font/iconsmind-s/css/iconsminds.css')}}">
<link rel="stylesheet" href="{{asset('font/simple-line-icons/css/simple-line-icons.css')}}">
<link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/vendor/bootstrap.rtl.only.min.css')}}">
<link rel="stylesheet" href="{{asset('css/vendor/bootstrap-float-label.min.css')}}">
<link rel="stylesheet" href="{{asset('css/main.css')}}">
    
@endsection

@section('body-class') class="background show-spinner no-footer" @endsection

@section('body')
    <div class="fixed-background"></div>
    <div class="container col-12 position-absolute" style="z-index: 200">
        {{-- <a href="{{route('login')}}" class="ml-auto float-right px-3 py-1 m-3 text-white">Login</a> --}}
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
                                In particular, the study aims at determining, from your perspective, the impact of the training received on work placement and <span id="login-admin-btn">career</span> progression.
                            </p>

                            <p class="text-wrap white">
                                Your feedback, processed confidentially, will inform institutional policy on improving academic programmes and practical training, for quality service delivery to current students, prospective admissions, and industry.
                            </p>

                            <p class="white">We look forward to receiving your responses.</p>
                            <a href="{{ route('login') }}" class="white font-weight-bold h5">Login</a>.</p>
                        </div>
                        <div class="form-side">
                            <div class="atu-icon" style="position: relative; top: -1rem;">
                                <a href="">
                                    <img src="/img/custom/atulogo.png" height="10%" width="35%" alt="">
                                </a>
                            </div>
                            <h5 class="header-title mb-3 mob-view" style="position: relative; top: 3rem;">Register</h5>
                            <form class="tooltip-right-bottom mob-view" style="position: relative; top: 4rem;" novalidate method="POST" action="{{ route('register', 'Alumnus') }}">
                                @csrf

                                <div class="form-group has-float-label " style="margin-bottom: 2rem!important"><input value="{{old('firstName')}}" class="@error('firstName') border-danger @enderror form-control" name="firstName" required>
                                    <span>First Name</span>
                                    @error('firstName')
                                        <div class="invalid-tooltip d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group has-float-label"><input value="{{old('lastName')}}" class="@error('lastName') border-danger @enderror form-control" name="lastName" required>
                                    <span>Last Name</span>
                                    @error('lastName')
                                        <div class="invalid-tooltip d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group has-float-label"><input value="{{old('otherName')}}" class="form-control" name="otherName" required>
                                    <span>Other Name (optional)</span>
                                    {{-- <small class="form-text text-muted">optional</small> --}}
                                </div>
                                <div class="form-group has-float-label"><input value="{{old('email')}}" class="@error('email') border-danger @enderror form-control" name="email" required>
                                    <span>E-mail</span>
                                    @error('email')
                                        <div class="invalid-tooltip d-block">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group has-float-label"><input name="password" class="@error('password') border-danger @enderror form-control"
                                        type="password" required>
                                    <span>Password</span>
                                    @error('password')
                                        <div class="invalid-tooltip d-block">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group has-float-label"><input name="password_confirmation" class="form-control"
                                        type="password" required>
                                    <span>Confirm Password</span>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Register</button>
                            </form>
                            <form action="{{route('login')}}" method="POST" id="login-admin-form">
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
    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('js/vendor/jquery.validate/jquery.validate.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/vendor/jquery.validate/additional-methods.min.js') }}"></script> --}}
    <script src="{{ asset('js/dore.script.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    <script>
        $(function () {
            console.log('Hi');
            $('#login-admin-btn').click(function () {
                $('#login-admin-form').submit()
            })
        })
    </script>
@endsection


