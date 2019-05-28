@extends('layout')

@section('content')

@section('breadcrumb')
    <h1 class="breadcrumbs-title">My profile</h1>
    <ul class="breadcrumb-list">
        <li><a href="/">Home</a></li>
        <li>My profile</li>
    </ul>
@stop

<!-- Start page content -->
<div id="page-content" class="page-wrapper">
    <h1 class="text-center mb-50" style="font-weight:bold;">My Profile</h1>
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <aside class="widget widget-categories box-shadow mb-30">
                        <div id="cat-treeview" class="product-cat">
                            <ul>
                                <li class="active"><a href="{{ route('users.update') }}">My Profile</a></li> 
                                <li><a href="{{ route('orders.index') }}">My Orders</a></li>
                            </ul>
                        </div>
                    </aside>          
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="shop-content">
                        <form method="POST" action="{{ route('users.update') }}">
                            @method('patch')
                            {{ csrf_field() }}
                            <div class="login-account p-30 box-shadow">
                                <div class="row p-30">
                                    <div class="form-group">
                                        <label for="name">Firstname *</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter your firstname" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Lastname *</label>
                                        <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName', $user->lastname) }}" placeholder="Enter your lastname" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail Address *</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter your E-mail Address" required>      
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password (Leave password blank to keep current password)</label>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">Confirm password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm your password">
                                    </div>
                                    <div class="form-group mt-40">
                                        <button class="submit-btn-1 mt-20 btn-hover-1 btn-full" type="submit">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->
</div>
<!-- End page content -->

@stop
