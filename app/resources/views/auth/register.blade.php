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
        <a href="{{route('login')}}" class="ml-auto float-right px-3 py-1 m-3 text-white">Login</a>
    </div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side">
                            <p class="text-white h2">MAGIC IS IN THE DETAILS</p>
                            <p class="white mb-0">Please use your credentials to login.<br>If you are not a member,
                                please <a href="#" class="white">register</a>.</p>
                        </div>
                        <div class="form-side"><a href="Dashboard.Default.html"><span class="logo-single"></span></a>
                            <form class="tooltip-right-bottom" novalidate method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group has-float-label"><input value="{{old('firstName')}}" class="@error('firstName') border-danger @enderror form-control" name="firstName" required>
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
@endsection


<!--
                            <form class="tooltip-right-bottom" novalidate method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group has-float-label"><input value="{{old('firstName')}}" class="@error('firstName') border-danger @enderror form-control" name="firstName" required>
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
                        -->