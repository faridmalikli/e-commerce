@extends('layout')

@section('title', 'Login')

@section('content')

@section('breadcrumb')
    <h1 class="breadcrumbs-title">Login</h1>
    <ul class="breadcrumb-list">
        <li><a href="/">Home</a></li>
        <li>Login</li>
    </ul>
@stop

<!-- Start page content -->
<div id="page-content" class="page-wrapper">
    <!-- LOGIN SECTION START -->
    <div class="login-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="registered-customers">
                        <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                            <h6 class="widget-title border-left mb-50">REGISTERED CUSTOMERS</h6>
                            <div class="login-account p-30 box-shadow">
                                <div class="row p-30">
                                    <p>If you have an account with us, Please log in. Othervise <a href="{{ route('register') }}">Create an account</a></p>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">E-mail Address</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your E-mail Address" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Password</label>
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="float:right;">Forgot Your Password?</a>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password" required >
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                        <button id="loginButton" class="btn-full submit-btn-1 mt-20 btn-hover-1" type="submit">Login</button>
                                        <a href="{{ route('guestCheckout.index') }}" id="registerButton" class="btn btn-full submit-btn-1 mt-20 btn-hover-1 f-right">Checkout as a Guest<a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN SECTION END -->
</div>
<!-- End page content -->

@stop