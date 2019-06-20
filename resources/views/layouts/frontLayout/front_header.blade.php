<!-- START HEADER AREA -->
<header class="header-area header-wrapper">
    <!-- header-top-bar -->
    <div class="header-top-bar plr-185">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 hidden-xs">
                    <div class="call-us">
                        <p class="mb-0 roboto">(+88) 01234-567890</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="top-link clearfix">
                        <ul class="link f-right">
                            @guest
                            <li>
                                <a href="{{ route('register') }}">
                                    <i class="zmdi zmdi-account-add"></i> Sign Up
                                </a>
                            </li>
                            <li onclick="myFunction()" id="loginForum">
                                <a href="{{ route('login') }}">
                                    <i class="zmdi zmdi-lock"></i> Login
                                </a>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('users.edit') }}">
                                    <i class="zmdi zmdi-account"></i> My Account
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    <i class="zmdi zmdi-minus-circle"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @endguest
                            <li>
                                <a href="{{ route('cart.index') }}">
                                    <i class="zmdi zmdi-shopping-cart"></i> Cart @if(Cart::instance('default')->count() > 0) ({{ Cart::instance('default')->count() }}) @endif

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-middle-area -->
    <div id="sticky-header" class="header-middle-area plr-185">
        <div class="container-fluid">
            <div class="full-width-mega-dropdown">
                <div class="row">
                    <!-- logo -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('images/frontend_images/img/logo/logo.png') }}" alt="main logo">
                            </a>
                        </div>
                    </div>
                    <!-- primary-menu -->
                    <div class="col-md-8 hidden-sm hidden-xs">
                        <nav id="primary-menu">
                            <ul class="main-menu text-center">
                                <li><a href="{{ route('landing-page') }}">Home</a></li>
                                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="search-top-cart  f-right">
                            <!-- header-search -->
                            <div class="header-search f-left">
                                <div class="header-search-inner">
                                    <button class="search-toggle">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                    <form action="{{ route('search') }}" method="GET">
                                        <div class="top-search-box">
                                            <input type="text" name="query" value="{{ request()->input('query') }}" placeholder="Search here your product...">
                                            <button type="submit">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- total-cart -->
                            <div class="total-cart f-left">
                                <div class="total-cart-in">
                                    <div class="cart-toggler">
                                        <a href="#">
                                            <span class="cart-quantity">02</span>
                                            <br>
                                            <span class="cart-icon">
                                                <i class="zmdi zmdi-shopping-cart-plus"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="top-cart-inner your-cart">
                                                <h5 class="text-capitalize">Your Cart</h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="total-cart-pro">
                                                <!-- single-cart -->
                                                <div class="single-cart clearfix">
                                                    <div class="cart-img f-left">
                                                        <a href="#">
                                                            <img src="{{ asset('images/frontend_images/img/cart/1.jpg') }}" alt="Cart Product" />
                                                        </a>
                                                        <div class="del-icon">
                                                            <a href="#">
                                                                <i class="zmdi zmdi-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="cart-info f-left">
                                                        <h6 class="text-capitalize">
                                                            <a href="#">Dummy Product Name</a>
                                                        </h6>
                                                        <p>
                                                            <span>Brand <strong>:</strong></span>Brand Name
                                                        </p>
                                                        <p>
                                                            <span>Model <strong>:</strong></span>Grand s2
                                                        </p>
                                                        <p>
                                                            <span>Color <strong>:</strong></span>Black, White
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- single-cart -->
                                                <div class="single-cart clearfix">
                                                    <div class="cart-img f-left">
                                                        <a href="#">
                                                            <img src="{{ asset('images/frontend_images/img/cart/1.jpg') }}" alt="Cart Product" />
                                                        </a>
                                                        <div class="del-icon">
                                                            <a href="#">
                                                                <i class="zmdi zmdi-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="cart-info f-left">
                                                        <h6 class="text-capitalize">
                                                            <a href="#">Dummy Product Name</a>
                                                        </h6>
                                                        <p>
                                                            <span>Brand <strong>:</strong></span>Brand Name
                                                        </p>
                                                        <p>
                                                            <span>Model <strong>:</strong></span>Grand s2
                                                        </p>
                                                        <p>
                                                            <span>Color <strong>:</strong></span>Black, White
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="top-cart-inner subtotal">
                                                <h4 class="text-uppercase g-font-2">
                                                    Total  =  
                                                    <span>$ 500.00</span>
                                                </h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="top-cart-inner view-cart">
                                                <h4 class="text-uppercase">
                                                    <a href="#">View cart</a>
                                                </h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="top-cart-inner check-out">
                                                <h4 class="text-uppercase">
                                                    <a href="#">Check out</a>
                                                </h4>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER AREA -->

<!-- START MOBILE MENU AREA -->
<div class="mobile-menu-area hidden-lg hidden-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li><a href="{{ route('landing-page') }}">Home</a></li>
                            <li><a href="{{ route('shop.index') }}">Shop</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MOBILE MENU AREA -->
<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs-inner">
                        @yield('breadcrumb')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMBS SETCTION END -->
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
</div>