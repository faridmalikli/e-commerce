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
    <div class="login-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-account p-30 box-shadow">
                        <div class="row p-20">
                            <div class="new-customers">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="loggedIn">
                                You are logged in!
                            </div>
                            <div class="mt-40" >
                                <a href="{{ route('shop.index') }}"><button class="submit-btn-1 mt-20 btn-hover-1 btn-full">CONTINUE SHOPPING</button><a>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End page content -->

@stop





