@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-float-label.min.css') }}">
    <style>
        .theme-button {
            display: none;
        }

    </style>
@endsection

@section('body-class') class="background show-spinner no-footer" @endsection

@section('body')
    <div class="fixed-background"></div>
    <div class="container col-12 position-absolute" style="z-index: 200">
        <a href="{{route('register')}}" class="ml-auto float-right px-3 py-1 m-3 text-white">Register</a>
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
                        <div class="form-side position-relative">
                            @if (session('error'))
                                <div class="alert alert-danger position-absolute"
                                    style="top: 5%; left: 50%; transform: translateX(-50%)">
                                    {{ session('error') }}
                                </div>
                            @endif


                            <div style="height: 95px"></div>

                            {{-- <a href="Dashboard.Default.html"><span class="logo-single"></span></a> --}}
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
                                    <span>Password</span>
                                    @error('password')
                                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Log in</button>
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
