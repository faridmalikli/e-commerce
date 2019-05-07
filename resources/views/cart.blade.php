@extends('layout')

@section('content')

@section('breadcrumb')
    <h1 class="breadcrumbs-title">Shopping Cart</h1>
    <ul class="breadcrumb-list">
        <li><a href="index.html">Home</a></li>
        <li>Shopping Cart</li>
    </ul>
@stop

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            @if(session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-2 col-sm-12">
                    <ul class="cart-tab">
                        <li>
                            <a class="active" href="#shopping-cart" data-toggle="tab">
                            <span>01</span>
                            Shopping cart
                            </a>
                        </li>
                        <li>
                            <a href="#wishlist" data-toggle="tab">
                            <span>02</span>
                            Wishlist
                            </a>
                        </li>
                        <li>
                            <a href="#checkout" data-toggle="tab">
                            <span>03</span>
                            Checkout
                            </a>
                        </li>
                        <li>
                            <a href="#order-complete" data-toggle="tab">
                            <span>04</span>
                            Order complete
                            </a>
                        </li>
                    </ul>
                </div>
                
                
                <div class="col-md-10 col-sm-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- shopping-cart start -->
                        <div class="tab-pane active" id="shopping-cart">
                            <div class="shopping-cart-content">
                            @if(Cart::count() > 0)
                            <h2>{{ Cart::count() }} item(s) in Cart!</h2>
                                <form action="#">
                                    <div class="table-content table-responsive mb-50">
                                        <table class="text-center">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">product</th>
                                                    <th class="product-price">price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-subtotal">total</th>
                                                    <th class="product-remove">remove</th>
                                                    <th class="product-remove">save for later</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- tr -->
                                                @foreach(Cart::content() as $item)
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <div class="pro-thumbnail-img">
                                                            <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('img/products/'. $item->model->slug .'.jpg') }}" alt=""></a>
                                                        </div>
                                                        <div class="pro-thumbnail-info text-left">
                                                            <h6 class="product-title-2">
                                                                <a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                                            </h6>
                                                            <p>Brand: Brand Name</p>
                                                            <p>Model: Grand s2</p>
                                                            <p> Color: Black, White</p>
                                                        </div>
                                                    </td>
                                                    <td class="product-price">{{ $item->model->presentPrice() }}</td>
                                                    <td class="product-quantity">
                                                        <select class="quantity" data-id="{{ $item->rowId }}">
                                                            @for ($i = 1; $i < 5 + 1; $i++)
                                                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                            @endfor
                                                            {{-- <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                                            <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                                            <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                                            <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option> --}}
                                                        </select>
                                                    </td>
                                                    <td class="product-subtotal">{{ presentPrice($item->subtotal) }}</td>
                                                    <td class="product-remove">
                                                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit"><i class="zmdi zmdi-close"></i></button>
                                                        </form>
                                                    </td>
                                                    <td class="product-remove">
                                                        <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <button type="submit"><i class="zmdi zmdi-star zmdi-hc-fw"></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="coupon-discount box-shadow p-30 mb-50">
                                                <h6 class="widget-title border-left mb-20">coupon discount</h6>
                                                <p>Enter your coupon code if you have one!</p>
                                                <input type="text" name="name" placeholder="Enter your code here.">
                                                <button class="submit-btn-1 black-bg btn-hover-2" type="submit">apply coupon</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="payment-details box-shadow p-30 mb-50">
                                                <h6 class="widget-title border-left mb-20">payment details</h6>
                                                <table>
                                                    <tr>
                                                        <td class="td-title-1">Cart Subtotal</td>
                                                        <td class="td-title-2">{{ presentPrice(Cart::subtotal()) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Shipping and Handing</td>
                                                        <td class="td-title-2">$15.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Vat</td>
                                                        <td class="td-title-2">$00.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-total">Order Total</td>
                                                        <td class="order-total-price">{{ presentPrice(Cart::total()) }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="culculate-shipping box-shadow p-30">
                                                <h6 class="widget-title border-left mb-20">culculate shipping</h6>
                                                <p>Enter your coupon code if you have one!</p>
                                                <div class="row">
                                                    <div class="col-sm-4 col-xs-12">
                                                        <input type="text"  placeholder="Country">
                                                    </div>
                                                    <div class="col-sm-4 col-xs-12">
                                                        <input type="text"  placeholder="Region / State">
                                                    </div>
                                                    <div class="col-sm-4 col-xs-12">
                                                        <input type="text"  placeholder="Post code">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button class="submit-btn-1 black-bg btn-hover-2">get a quote</button>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <h2>No items in Cart!</h2>
                                        <a class="button">Continue Shopping</a>
                                    @endif
                                </form>
                                @if(Cart::instance('saveForLater')->count() > 0)
                                <h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later!</h2>
                                <div class="table-content table-responsive mt-50">
                                        <table class="text-center">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">product</th>
                                                    <th class="product-price">price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-subtotal">total</th>
                                                    <th class="product-remove">remove</th>
                                                    <th class="product-remove">move to cart</th>
                                            </thead>
                                            <tbody>
                                                <!-- tr -->
                                                @foreach(Cart::instance('saveForLater')->content() as $item)
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <div class="pro-thumbnail-img">
                                                            <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('img/products/'. $item->model->slug .'.jpg') }}" alt=""></a>
                                                        </div>
                                                        <div class="pro-thumbnail-info text-left">
                                                            <h6 class="product-title-2">
                                                                <a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                                            </h6>
                                                            <p>Brand: Brand Name</p>
                                                            <p>Model: Grand s2</p>
                                                            <p> Color: Black, White</p>
                                                        </div>
                                                    </td>
                                                    <td class="product-price">{{ $item->model->presentPrice() }}</td>
                                                    <td class="product-quantity">
                                                        <div class="cart-plus-minus f-left">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal">$1020.00</td>
                                                    <td class="product-remove">
                                                        <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit"><i class="zmdi zmdi-close"></i></button>
                                                        </form>
                                                    </td>
                                                    <td class="product-remove">
                                                        <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <button type="submit"><i class="zmdi zmdi-star zmdi-hc-fw"></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>       
                                @else 
                                    <h2>You have no items Saved For Later!<h2>
                                @endif      
                            </div>
                        </div>
                        + 
                        <!-- shopping-cart end -->
                        <!-- wishlist start -->
                        <div class="tab-pane" id="wishlist">
                            <div class="wishlist-content">
                                <form action="#">
                                    <div class="table-content table-responsive mb-50">
                                        <table class="text-center">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">product</th>
                                                    <th class="product-price">price</th>
                                                    <th class="product-stock">Stock status</th>
                                                    <th class="product-add-cart">add to cart</th>
                                                    <th class="product-remove">remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- tr -->
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <div class="pro-thumbnail-img">
                                                            <img src="img/cart/1.jpg" alt="">
                                                        </div>
                                                        <div class="pro-thumbnail-info text-left">
                                                            <h6 class="product-title-2">
                                                                <a href="#">dummy product name</a>
                                                            </h6>
                                                            <p>Brand: Brand Name</p>
                                                            <p>Model: Grand s2</p>
                                                            <p> Color: Black, White</p>
                                                        </div>
                                                    </td>
                                                    <td class="product-price">$560.00</td>
                                                    <td class="product-stock text-uppercase">in stoct</td>
                                                    <td class="product-add-cart">
                                                        <a href="#" title="Add To Cart">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                        </a>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                                <!-- tr -->
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <div class="pro-thumbnail-img">
                                                            <img src="img/cart/2.jpg" alt="">
                                                        </div>
                                                        <div class="pro-thumbnail-info text-left">
                                                            <h6 class="product-title-2">
                                                                <a href="#">dummy product name</a>
                                                            </h6>
                                                            <p>Brand: Brand Name</p>
                                                            <p>Model: Grand s2</p>
                                                            <p> Color: Black, White</p>
                                                        </div>
                                                    </td>
                                                    <td class="product-price">$560.00</td>
                                                    <td class="product-stock text-uppercase">in stoct</td>
                                                    <td class="product-add-cart">
                                                        <a href="#" title="Add To Cart">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                        </a>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                                <!-- tr -->
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <div class="pro-thumbnail-img">
                                                            <img src="img/cart/3.jpg" alt="">
                                                        </div>
                                                        <div class="pro-thumbnail-info text-left">
                                                            <h6 class="product-title-2">
                                                                <a href="#">dummy product name</a>
                                                            </h6>
                                                            <p>Brand: Brand Name</p>
                                                            <p>Model: Grand s2</p>
                                                            <p> Color: Black, White</p>
                                                        </div>
                                                    </td>
                                                    <td class="product-price">$560.00</td>
                                                    <td class="product-stock text-uppercase">in stoct</td>
                                                    <td class="product-add-cart">
                                                        <a href="#" title="Add To Cart">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                        </a>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- wishlist end -->
                        <!-- checkout start -->
                        <div class="tab-pane" id="checkout">
                            <div class="checkout-content box-shadow p-30">
                                <form action="#">
                                    <div class="row">
                                        <!-- billing details -->
                                        <div class="col-md-6">
                                            <div class="billing-details pr-10">
                                                <h6 class="widget-title border-left mb-20">billing details</h6>
                                                <input type="text"  placeholder="Your Name Here...">
                                                <input type="text"  placeholder="Email address here...">
                                                <input type="text"  placeholder="Phone here...">
                                                <input type="text"  placeholder="Company neme here...">
                                                <select class="custom-select">
                                                    <option value="defalt">country</option>
                                                    <option value="c-1">Australia</option>
                                                    <option value="c-2">Bangladesh</option>
                                                    <option value="c-3">Unitd States</option>
                                                    <option value="c-4">Unitd Kingdom</option>
                                                </select>
                                                <select class="custom-select">
                                                    <option value="defalt">State</option>
                                                    <option value="c-1">Melbourne</option>
                                                    <option value="c-2">Dhaka</option>
                                                    <option value="c-3">New York</option>
                                                    <option value="c-4">London</option>
                                                </select>
                                                <select class="custom-select">
                                                    <option value="defalt">Town/City</option>
                                                    <option value="c-1">Victoria</option>
                                                    <option value="c-2">Chittagong</option>
                                                    <option value="c-3">Boston</option>
                                                    <option value="c-4">Cambridge</option>
                                                </select>
                                                <textarea class="custom-textarea" placeholder="Your address here..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- our order -->
                                            <div class="payment-details pl-10 mb-50">
                                                <h6 class="widget-title border-left mb-20">our order</h6>
                                                <table>
                                                    <tr>
                                                        <td class="td-title-1">Dummy Product Name x 2</td>
                                                        <td class="td-title-2">$1855.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Dummy Product Name</td>
                                                        <td class="td-title-2">$555.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Cart Subtotal</td>
                                                        <td class="td-title-2">$2410.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Shipping and Handing</td>
                                                        <td class="td-title-2">$15.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Vat</td>
                                                        <td class="td-title-2">$00.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-total">Order Total</td>
                                                        <td class="order-total-price">$2425.00</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- payment-method -->
                                            <div class="payment-method">
                                                <h6 class="widget-title border-left mb-20">payment method</h6>
                                                <div id="accordion">
                                                    <div class="panel">
                                                        <h4 class="payment-title box-shadow">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#bank-transfer" >
                                                            direct bank transfer
                                                            </a>
                                                        </h4>
                                                        <div id="bank-transfer" class="panel-collapse collapse in" >
                                                            <div class="payment-content">
                                                                <p>Lorem Ipsum is simply in dummy text of the printing and type setting industry. Lorem Ipsum has been.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <h4 class="payment-title box-shadow">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                            cheque payment
                                                            </a>
                                                        </h4>
                                                        <div id="collapseTwo" class="panel-collapse collapse">
                                                            <div class="payment-content">
                                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <h4 class="payment-title box-shadow">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >
                                                            paypal
                                                            </a>
                                                        </h4>
                                                        <div id="collapseThree" class="panel-collapse collapse" >
                                                            <div class="payment-content">
                                                                <p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                                                <ul class="payent-type mt-10">
                                                                    <li><a href="#"><img src="img/payment/1.png" alt=""></a></li>
                                                                    <li><a href="#"><img src="img/payment/2.png" alt=""></a></li>
                                                                    <li><a href="#"><img src="img/payment/3.png" alt=""></a></li>
                                                                    <li><a href="#"><img src="img/payment/4.png" alt=""></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- payment-method end -->
                                            <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">place order</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- checkout end -->
                        <!-- order-complete start -->
                        <div class="tab-pane" id="order-complete">
                            <div class="order-complete-content box-shadow">
                                <div class="thank-you p-30 text-center">
                                    <h6 class="text-black-5 mb-0">Thank you. Your order has been received.</h6>
                                </div>
                                <div class="order-info p-30 mb-10">
                                    <ul class="order-info-list">
                                        <li>
                                            <h6>order no</h6>
                                            <p>m 2653257</p>
                                        </li>
                                        <li>
                                            <h6>order no</h6>
                                            <p>m 2653257</p>
                                        </li>
                                        <li>
                                            <h6>order no</h6>
                                            <p>m 2653257</p>
                                        </li>
                                        <li>
                                            <h6>order no</h6>
                                            <p>m 2653257</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <!-- our order -->
                                    <div class="col-md-6">
                                        <div class="payment-details p-30">
                                            <h6 class="widget-title border-left mb-20">our order</h6>
                                            <table>
                                                <tr>
                                                    <td class="td-title-1">Dummy Product Name x 2</td>
                                                    <td class="td-title-2">$1855.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="td-title-1">Dummy Product Name</td>
                                                    <td class="td-title-2">$555.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="td-title-1">Cart Subtotal</td>
                                                    <td class="td-title-2">$2410.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="td-title-1">Shipping and Handing</td>
                                                    <td class="td-title-2">$15.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="td-title-1">Vat</td>
                                                    <td class="td-title-2">$00.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="order-total">Order Total</td>
                                                    <td class="order-total-price">$2425.00</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bill-details p-30">
                                            <h6 class="widget-title border-left mb-20">billing details</h6>
                                            <ul class="bill-address">
                                                <li>
                                                    <span>Address:</span>
                                                    28 Green Tower, Street Name, New York City, USA
                                                </li>
                                                <li>
                                                    <span>email:</span>
                                                    info@companyname.com
                                                </li>
                                                <li>
                                                    <span>phone : </span>
                                                    (+880) 19453 821758
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bill-details pl-30">
                                            <h6 class="widget-title border-left mb-20">billing details</h6>
                                            <ul class="bill-address">
                                                <li>
                                                    <span>Address:</span>
                                                    28 Green Tower, Street Name, New York City, USA
                                                </li>
                                                <li>
                                                    <span>email:</span>
                                                    info@companyname.com
                                                </li>
                                                <li>
                                                    <span>phone : </span>
                                                    (+880) 19453 821758
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- order-complete end -->
                    </div>
                    <div class="row mt-150">
                            <div class="col-md-12">
                                <div class="section-title text-left mb-40">
                                    <h2 class="uppercase">related product</h2>
                                    <h6>There are many variations of passages of brands available,</h6>
                                </div>
                            </div>
                        </div>
                        <div class="related-product-area">
                            <div class="row">
                                <div class="active-related-product">
                                    <!-- product-item start -->
                                    @foreach($relatedProduct as $product)
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="{{ route('shop.show', $product->slug) }}">
                                                <img src="{{ asset('img/products/'. $product->slug .'.jpg') }}" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                    <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </div>
                                                <h3 class="pro-price">{{ $product->presentPrice() }}</h3>
                                                <ul class="action-button">
                                                    <li>
                                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- product-item end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->             
</section>

                        

@stop

@section('extra-js')

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = "{{ route('cart.index') }}";
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = "{{ route('cart.index') }}";
                    });
                })
            })
        })();
    </script>

@stop