@extends('layout')

@section('title', 'Registation')

@section('content')

@section('breadcrumb')
    <h1 class="breadcrumbs-title">Enter Email</h1>
    <ul class="breadcrumb-list">
        <li><a href="/">Home</a></li>
        <li>Enter Email</li>
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
                        <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                            <h6 class="widget-title border-left mb-50">{{ __('Reset Password') }}</h6>
                            <div class="login-account p-30 box-shadow">
                                <div class="row p-30">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mt-40">
                                        <button class="submit-btn-1 mt-20 btn-hover-1 btn-full" type="submit">{{ __('Send Password Reset Link') }}</button>
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