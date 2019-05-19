@extends('layout')

@section('title', 'Registation')

@section('content')

@section('breadcrumb')
    <h1 class="breadcrumbs-title">Registration</h1>
    <ul class="breadcrumb-list">
        <li><a href="/">Home</a></li>
        <li>Registration</li>
    </ul>
@stop

<!-- Start page content -->
<div id="page-content" class="page-wrapper">
    <!-- LOGIN SECTION START -->
    <div class="login-section mb-80">
        <div class="container">
            <div class="row">
                <!-- new-customers -->
                <div class="col-md-6 col-md-offset-3">
                    <div class="new-customers">
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <h6 class="widget-title border-left mb-50">NEW CUSTOMERS</h6>
                            <div class="login-account p-30 box-shadow">
                                <div class="row p-30">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name">Firstname *</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter your firstname" required autofocus >
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                        <label for="lastName">Lastname *</label>
                                        <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" placeholder="Enter your lastname" required autofocus >
                                        @if ($errors->has('lastName'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">E-mail Address *</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your E-mail Address" required >
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Password *</label>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password" required >
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                                        <label for="password-confirm">Confirm password *</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm your password" required >
                                    </div>
                                    <div class="checkbox">
                                        <label class="mr-10">
                                            <small>
                                                <input type="checkbox" name="signup">Sign up for our newsletter!
                                            </small>
                                        </label>
                                        <label>
                                            <small>
                                                <input type="checkbox" name="signup">Receive special offers from our partners!
                                            </small>
                                        </label>
                                    </div>
                                    <div class="form-group mt-40">
                                        <button class="submit-btn-1 mt-20 btn-hover-1 btn-full" type="submit">Create an account</button>
                                    </div>
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





