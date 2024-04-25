@extends('layouts.app')
@section('title','Register')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<div class="page-banner-section section">
    <div class="page-banner-wrap row row-0 d-flex align-items-center ">

        <!-- Page Banner -->
        <div class="col-lg-12 col-12 order-lg-2 d-flex align-items-center justify-content-center">
            <div class="page-banner">
                <div class="page-banner">
                    <h1>Register</h1>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ route('home') }}">HOME</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<div class="login-section section mt-20 mb-20">
    <div class="container">
        <div class="row">

            <!-- Login -->
            <div class="col-md-6 col-12 d-flex">
                <div class="ee-login">

                    <h3>REGISTER to your account</h3>
                    <p>E&amp;E provide how all this mistaken idea of denouncing pleasure and sing pain born an will give you a complete account of the system, and expound</p>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-30">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Type your name address"name="name" value="{{ old('name') }}"  autocomplete="name" autofocus required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                            <div class="col-12 mb-30">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Type your email address"name="email" value="{{ old('email') }}"  autocomplete="email" autofocus required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                            <div class="col-12 mb-20">
                                <input type="password"class="form-control @error('password') is-invalid @enderror"  placeholder="Enter your passward" name="password" required >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror

                            </div>
                            <div class="col-12 mb-20">
                                <input type="password"class="form-control @error('password_confirmation') is-invalid @enderror"  placeholder="Enter your passward confirmation" name="password_confirmation" required >
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror

                            </div>

                            <div class="col-12"><input type="submit" value="REGISTER"></div>
                        </div>
                    </form>
                    <h4>Don’t have account? please click <a href="{{ route('login') }}">Login</a></h4>

                </div>
            </div>

            <div class="col-md-1 col-12 d-flex">

                <div class="login-reg-vertical-boder"></div>

            </div>

            <!-- Login With Social -->
            <div class="col-md-5 col-12 d-flex">

                <div class="ee-social-login">
                    <h3>Also you can login with...</h3>

                    {{-- <a href="#" class="twitter-login">Login with <i class="fa fa-twitter"></i></a> --}}
                    <a href="{{ route('social.oauth', 'facebook') }}" class="facebook-login">Login with <i class="fa fa-facebook"></i></a>
                    {{--  <a href="#" class="twitter-login">Login with <i class="fa fa-twitter"></i></a> --}}
                     <a href="{{ route('social.oauth', 'google') }}" class="google-plus-login">Login with <i class="fa fa-google-plus"></i></a>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
