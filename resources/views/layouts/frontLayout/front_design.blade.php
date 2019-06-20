<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-commerce | @yield('title', '')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/frontend_images/img/icon/favicon.png">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/bootstrap.min.css') }}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/nivo-slider.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/responsive.css') }}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/custom.css') }}">
    <!-- Stripe css -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/stripe.css') }}">
    
    
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/style-customizer.css') }}">
    <link href="#" data-style="styles" rel="stylesheet">

    <!-- Modernizr JS -->
    <script src="{{ asset('js/frontend_js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">

        @include('layouts.frontLayout.front_header')

        @yield('content')

        @include('layouts.frontLayout.front_footer') 

        {{-- <!--style-customizer start -->
        <div class="style-customizer closed">
            <div class="buy-button">
                <a href="index.html" class="customizer-logo"><img src="images/frontend_image/logo/logo.png" alt="Theme Logo"></a>
                <a class="opener" href="#"><i class="zmdi zmdi-settings"></i></a>
            </div>
            <div class="clearfix content-chooser">
                <h3>Layout Options</h3>
                <p>Which layout option you want to use?</p>
                <ul class="layoutstyle clearfix">
                    <li class="wide-layout selected" data-style="wide" title="wide"> Wide </li>
                    <li class="boxed-layout" data-style="boxed" title="boxed"> Boxed </li>
                </ul>
                <h3>Color Schemes</h3>
                <p>Which theme color you want to use? Select from here.</p>
                <ul class="styleChange clearfix">
                    <li class="skin-default selected" title="skin-default" data-style="skin-default" ></li>
                    <li class="skin-green" title="green" data-style="skin-green"></li>
                    <li class="skin-purple" title="purple" data-style="skin-purple"></li>
                    <li class="skin-blue" title="blue" data-style="skin-blue"></li>
                    <li class="skin-cyan" title="cyan" data-style="skin-cyan"></li>
                    <li class="skin-amber" title="amber" data-style="skin-amber"></li>
                    <li class="skin-blue-grey" title="blue-grey" data-style="skin-blue-grey"></li>
                    <li class="skin-teal" title="teal" data-style="skin-teal"></li>
                </ul>
                <h3>Background Patterns</h3>
                <p>Which background pattern you want to use?</p>
                    <ul class="patternChange clearfix">
                    <li class="pattern-1" data-style="pattern-1" title="pattern-1"></li>
                    <li class="pattern-2" data-style="pattern-2" title="pattern-2"></li>
                    <li class="pattern-3" data-style="pattern-3" title="pattern-3"></li>
                    <li class="pattern-4" data-style="pattern-4" title="pattern-4"></li>
                    <li class="pattern-5" data-style="pattern-5" title="pattern-5"></li>
                    <li class="pattern-6" data-style="pattern-6" title="pattern-6"></li>
                    <li class="pattern-7" data-style="pattern-7" title="pattern-7"></li>
                    <li class="pattern-8" data-style="pattern-8" title="pattern-8"></li>
                </ul>
                <h3>Background Images</h3>
                <p>Which background image you want to use?</p>
                <ul class="patternChange main-bg-change clearfix">
                    <li class="main-bg-1" data-style="main-bg-1" title="Background 1"> <img src="{{ asset('images/frontend_images/customizer/bodybg/01.jpg') }}" alt=""></li>
                    <li class="main-bg-2" data-style="main-bg-2" title="Background 2"> <img src="{{ asset('images/frontend_images/customizer/bodybg/02.jpg') }}" alt=""></li>
                    <li class="main-bg-3" data-style="main-bg-3" title="Background 3"> <img src="{{ asset('images/frontend_images/customizer/bodybg/03.jpg') }}" alt=""></li>
                    <li class="main-bg-4" data-style="main-bg-4" title="Background 4"> <img src="{{ asset('images/frontend_images/customizer/bodybg/04.jpg') }}" alt=""></li>
                    <li class="main-bg-5" data-style="main-bg-5" title="Background 5"> <img src="{{ asset('images/frontend_images/customizer/bodybg/05.jpg') }}" alt=""></li>
                    <li class="main-bg-6" data-style="main-bg-6" title="Background 6"> <img src="{{ asset('images/frontend_images/customizer/bodybg/06.jpg') }}" alt=""></li>
                    <li class="main-bg-7" data-style="main-bg-7" title="Background 7"> <img src="{{ asset('images/frontend_images/customizer/bodybg/07.jpg') }}" alt=""></li>
                    <li class="main-bg-8" data-style="main-bg-8" title="Background 8"> <img src="{{ asset('images/frontend_images/customizer/bodybg/08.jpg') }}" alt=""></li>
                </ul>
                <ul class="resetAll">
                    <li><a class="button button-border button-reset" href="#">Reset All</a></li>
                </ul>
            </div>
        </div>
        <!--style-customizer end -->  --}}
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed JS at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{ asset('js/frontend_js/vendor/jquery-3.1.1.min.js') }}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('js/frontend_js/bootstrap.min.js') }}"></script>
    <!-- jquery.nivo.slider js -->
    <script src="{{ asset('js/frontend_js/jquery.nivo.slider.js') }}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('js/frontend_js/plugins.js') }}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{ asset('js/frontend_js/main.js') }}"></script>

    @yield('extra-js');

</body>
<!-- Mirrored from demo.hasthemes.com/subas-preview/subas/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Apr 2019 10:05:17 GMT -->
</html>