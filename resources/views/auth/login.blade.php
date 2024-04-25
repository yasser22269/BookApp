@extends('layouts.app')
@section('title', 'Login')
@section('content')


 <div class="page-banner-section section">
    <div class="page-banner-wrap row row-0 d-flex align-items-center ">

        <!-- Page Banner -->
        <div class="col-lg-12 col-12 order-lg-2 d-flex align-items-center justify-content-center">
            <div class="page-banner">
                <h1>Login</h1>
                <p>similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita</p>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{ route('home') }}">HOME</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
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

                    <h3>Login to your account</h3>
                    <p>E&amp;E provide how all this mistaken idea of denouncing pleasure and sing pain born an will give you a complete account of the system, and expound</p>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row">
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
                            {{-- <div class="col-12 mb-15">

                                <input  type="checkbox" name="remember" id="remember_me" >

                                <label for="remember">
                                    {{ __('Remember Me') }}
                                </label>


                                <a href="#">Forgotten pasward?</a>

                            </div> --}}
                            <div class="col-12"><input type="submit" value="LOGIN"></div>
                        </div>
                    </form>
                    <h4>Don’t have account? please click <a href="{{route('register')}}">Register</a></h4>

                </div>
            </div>

            <div class="col-md-1 col-12 d-flex">

                <div class="login-reg-vertical-boder"></div>

            </div>


        </div>
    </div>
</div>
@endsection
