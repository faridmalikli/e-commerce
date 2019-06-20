@extends('layouts.frontLayout.front_design')

@section('content')

@section('breadcrumb')
    <h1 class="breadcrumbs-title">My orders</h1>
    <ul class="breadcrumb-list">
        <li><a href="/">Home</a></li>
        <li>My orders</li>
    </ul>
@stop

<!-- Start page content -->
<div id="page-content" class="page-wrapper">
    <h1 class="text-center mb-50" style="font-weight:bold;">My Orders</h1>
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <aside class="widget widget-categories box-shadow mb-30">
                        <div id="cat-treeview" class="product-cat">
                            <ul>
                                <li><a href="{{ route('users.update') }}">My Profile</a></li> 
                                <li class="active"><a href="{{ route('orders.index') }}">My Orders</a></li>
                            </ul>
                        </div>
                    </aside>          
                </div>
                <div class="col-md-9 col-xs-12">
                    <div class="table-content table-responsive mb-50">
                        <div class="shop-content">
                        @foreach ($orders as $order)
                            <div style="color:black; font-weight:bold; font-size:1.2em; float:left;">Order ID: {{ $order->id }} | {{ $order->created_at }}</div>
                            <div style="font-weight:bold; font-size:1.2em; float:right;">
                                <a href="{{ route('orders.show', $order->id) }}">View order details</a>
                            </div>
                            <table class="text-center" style="margin: 10px 0;">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">product</th>
                                        <th class="product-price">price</th>
                                        <th class="product-quantity">Qty</th>
                                        <th class="product-subtotal">total</th>
                                    </tr>
                                </thead>
                                <tbody>    
                                    @foreach ($order->products as $product)          
                                    <tr>
                                        <td class="product-thumbnail">
                                        <div class="pro-thumbnail-img">
                                                <img src="{{ asset($product->image) }}" alt="Product image">
                                            </div>
                                            <div class="pro-thumbnail-info text-left">
                                                <h6 class="product-title-2">
                                                    <a href="">{{ $product->name }}</a>
                                                </h6>
                                                <p>Brand: Brand Name</p>
                                                <p>Model: Grand s2</p>
                                                <p> Color: Black, White</p>
                                            </div>
                                        </td>
                                        <td class="product-price">{{ presentPrice($product->price) }}</td>
                                        <td class="product-quantity">{{ $product->pivot->quantity }}</td>
                                        <td class="product-subtotal">{{ presentPrice($product->price*$product->pivot->quantity) }}</td>
                                        {{-- <td class="product-remove">
                                            <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit"><i class="zmdi zmdi-star zmdi-hc-fw"></button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center" style="color:red; font-weight:bold; font-size:1.2em;">Order Billing Total: {{ presentPrice($order->billing_total) }}</div>
                            <hr style="margin: 10px 0 30px;">
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->
</div>
<!-- End page content -->

@stop
