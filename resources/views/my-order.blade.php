@extends('layouts.frontLayout.front_design')

@section('content')

@section('breadcrumb')
    <h1 class="breadcrumbs-title">My order</h1>
    <ul class="breadcrumb-list">
        <li><a href="/">Home</a></li>
        <li>My order</li>
    </ul>
@stop

<!-- Start page content -->
<div id="page-content" class="page-wrapper">
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
                    <!-- order-complete start -->
                    <div class="tab-pane active" id="order-complete">
                        <div class="order-complete-content box-shadow">
                            <div class="order-info p-30 mb-10">
                                <ul class="order-info-list">
                                    <li>
                                        <h4 style="color:black; font-weight:bold;">order id: {{ $order->id }}</h4>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <!-- our order -->
                                <div class="col-md-6">
                                    <div class="payment-details p-30">
                                        <h6 class="widget-title border-left mb-20">your order</h6>
                                        <table>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td class="td-title-1">{{ $product->name }}</td>
                                                    <td class="td-title-2">{{ presentPrice($product->price) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="td-title-1">{{ $product->name }} x {{ $product->pivot->quantity }}</td>
                                                    <td class="td-title-2">{{ presentPrice($product->price*$product->pivot->quantity) }}</td>
                                                </tr>
                                            @endforeach
                                            @if ($order->billing_discount)
                                                <tr>
                                                    <td class="td-title-1">Discount</td>
                                                    <td class="td-title-2">{{ presentPrice($order->billing_discount) }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td class="td-title-1">Cart Subtotal</td>
                                                <td class="td-title-2">{{ presentPrice($order->billing_subtotal) }}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td class="td-title-1">Shipping and Handing</td>
                                                <td class="td-title-2">$15.00</td>
                                            </tr> --}}
                                            <tr>
                                                <td class="td-title-1">Vat</td>
                                                <td class="td-title-2">{{ presentPrice($order->billing_tax) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="order-total">Order Total</td>
                                                <td class="order-total-price">{{ presentPrice($order->billing_total) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bill-details p-30">
                                        <h6 class="widget-title border-left mb-20">billing details</h6>
                                        <ul class="bill-address">
                                            <li>
                                                <span>name:</span> {{ $order->billing_name }}
                                            </li>
                                            <li>
                                                <span>email:</span> {{ $order->billing_email }}
                                            </li>
                                            <li>
                                                <span>phone : </span> {{ $order->billing_phone }}
                                            </li>
                                            <li>
                                                <span>Address:</span> {{ $order->billing_address }}, {{ $order->billing_city }}, {{ $order->billing_province }}, {{ $order->billing_postalcode }}
                                            </li>          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- order-complete end -->
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->
</div>
<!-- End page content -->

@stop
