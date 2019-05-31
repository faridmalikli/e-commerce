@extends('layout')

@section('content')

@section('breadcrumb')
    <h1 class="breadcrumbs-title">product grid view</h1>
    <ul class="breadcrumb-list">
        <li><a href="/">Home</a></li>
        <li>product grid view</li>
    </ul>
@stop

<!-- Start page content -->
<div id="page-content" class="page-wrapper">
    <h1 class="text-center mb-50" style="font-weight:bold;">{{ $categoryName }}</h1>
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-push-3 col-xs-12">
                    <div class="shop-content">
                        <!-- shop-option start -->
                        <div class="shop-option box-shadow mb-30 clearfix">
                            <!-- Nav tabs -->
                            <ul class="shop-tab f-left" role="tablist">
                                <li class="active">
                                    <a href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
                                </li>
                                <li>
                                    <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                                </li>
                            </ul>
                            <!-- short-by -->
                            <div class="short-by f-left text-center">
                                <select id="sort">
                                    <option value="" selected>Sort By</option>
                                    <option value="{{ route('shop.index', ['category' => request()->category, 'system' => request()->system, 'sort' => 'low_high']) }}">Low to High</option>
                                    <option value="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_low']) }}">High to Low</option>
                                    <option value="{{ route('shop.index', ['category' => request()->category, 'sort' => 'latest']) }}">Latest</option>
                                    <option value="{{ route('shop.index', ['category' => request()->category, 'sort' => 'oldest']) }}">Oldest</option>
                                </select>
                            </div>
                            <!-- showing -->
                            <div class="showing f-right text-right">
                                <span>Showing :  {{ $products->firstItem() == $products->lastItem() ? '' : $products->firstItem() . ' -' }}  {{ $products->lastItem() == 0 ? '' : $products->lastItem() . ' of'}}  {{ $products->total() }}</span>
                            </div>
                        </div>
                        <!-- shop-option end -->
                        <!-- Tab Content start -->
                        <div class="tab-content">
                            <!-- grid-view -->
                            <div role="tabpanel" class="tab-pane active" id="grid-view">
                                <div class="row">
                                    <!-- product-item start -->
                                    @forelse($products as $product)
                                    <div class="col-md-4 col-sm-4 col-xs-12">
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
                                    @empty
                                    <div class="bg-danger mb-50" style="color:black; padding:10px; font-size:16px; font-weight:bold;">No items found!</div>
                                    @endforelse
                                    <!-- product-item end -->
                                </div>
                            </div>
                            <!-- list-view -->
                            <div role="tabpanel" class="tab-pane" id="list-view">
                                <div class="row">
                                @forelse($products as $product)
                                    <!-- product-item start -->
                                    <div class="col-md-12">
                                        <div class="shop-list product-item">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('img/products/'. $product->slug .'.jpg') }}" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <div class="clearfix">
                                                    <h6 class="product-title f-left">
                                                        <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                                    </h6>
                                                    <div class="pro-rating f-right">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                </div>
                                                <h6 class="brand-name mb-30">Brand Name</h6>
                                                <h3 class="pro-price">{{ $product->presentPrice() }}</h3>
                                                <p>{{ $product->description }}</p>
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
                                    <!-- product-item end -->
                                    @empty
                                        <div class="bg-danger mb-50" style="color:black; padding:10px; font-size:16px; font-weight:bold;">No items found!</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!-- Tab Content end -->
                        <!-- shop-pagination start -->
                        <div class="text-center">
                            {{ $products->appends(request()->input())->links() }}
                        </div>
                        {{-- <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                            <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                            <li><a href="#">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">05</a></li>
                            <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                        </ul> --}}
                        <!-- shop-pagination end -->
                    </div>
                </div>
                <div class="col-md-3 col-md-pull-9 col-xs-12">
                    <!-- widget-search -->
                    <aside class="widget-search mb-30">
                        <form action="#">
                            <input type="text" placeholder="Search here...">
                            <button type="submit"><i class="zmdi zmdi-search"></i></button>
                        </form>
                    </aside>
                    <!-- widget-categories -->
                    <aside class="widget widget-categories box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">Categories</h6>
                        <div id="cat-treeview" class="product-cat">
                            <ul>
                                @foreach($categories as $category)
                                    <li class="closed {{ setActiveCategory($category->slug) }}"><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li> 
                                @endforeach 
                            </ul>
                        </div>
                    </aside>
                    <!-- shop-filter -->
                    <aside class="widget shop-filter box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">Price</h6>
                        <div class="price_filter">
                            <div class="price_slider_amount">
                                <input type="submit"  value="You range :"/> 
                                <input type="text" id="amount" name="price"  placeholder="Add Your Price" /> 
                            </div>
                            <div id="slider-range"></div>
                        </div>
                        {{-- <div id="price">
                        <input type="checkbox" id="checkbox" name="first" value="{{ route('shop.index', ['category' => request()->category, 'priceRange' => 'first']) }}"> 1-100<br>
                        <input type="checkbox"  name="second" value="{{ route('shop.index', ['category' => request()->category, 'priceRange' => 'second']) }}"> 101-200<br>
                        <input type="checkbox"  name="third" value="{{ route('shop.index', ['category' => request()->category, 'priceRange' => 'third']) }}"> 201-300<br>
                        </div> --}}
                    </aside>
                    <!-- widget-color -->
                    <aside class="widget widget-color box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">color</h6>
                        <ul>
                            <li class="color-1"><a href="#">LightSalmon</a></li>
                            <li class="color-2"><a href="#">Dark Salmon</a></li>
                            <li class="color-3"><a href="#">Tomato</a></li>
                            <li class="color-4"><a href="#">Deep Sky Blue</a></li>
                            <li class="color-5"><a href="#">Electric Purple</a></li>
                            <li class="color-6"><a href="#">Atlantis</a></li>
                        </ul>
                    </aside>
                    <!-- operating-system -->
                    <aside class="widget operating-system box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">operating system</h6>
                        <div id="opeatingSystem"> 
                            <label><input type="checkbox" name="operating-system"><a href="{{ route('shop.index', ['category' => request()->category, 'sort' => request()->sort, 'system' => 'android']) }}">Android</a></label><br>    
                            <label><input type="checkbox" name="operating-system"<a href="{{ route('shop.index', ['category' => request()->category, 'sort' => request()->sort, 'system' => 'Windows phone']) }}">Android</a>>Windows Phone</label><br>
                            <label><input type="checkbox" name="operating-system" value="{{ route('shop.index', ['category' => request()->category, 'system' => 'Bleckgerry ios']) }}">Bleckgerry ios</label><br>
                            <label><input type="checkbox" name="operating-system" value="{{ route('shop.index', ['category' => request()->category, 'system' => 'Ios']) }}">Ios</label><br> 
                        </div>                    
                    </aside>
                    <!-- widget-product -->
                    <aside class="widget widget-product box-shadow">
                        <h6 class="widget-title border-left mb-20">recent products</h6>
                        <!-- product-item start -->
                        <div class="product-item">
                            <div class="product-img">
                                <a href="single-product.html">
                                <img src="{{ asset('img/products/4.jpg') }}" alt=""/>
                                </a>
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">
                                    <a href="single-product.html">Product Name</a>
                                </h6>
                                <h3 class="pro-price">$ 869.00</h3>
                            </div>
                        </div>
                        <!-- product-item end -->
                        <!-- product-item start -->
                        <div class="product-item">
                            <div class="product-img">
                                <a href="single-product.html">
                                <img src="{{ asset('img/products/8.jpg') }}" alt=""/>
                                </a>
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">
                                    <a href="single-product.html">Product Name</a>
                                </h6>
                                <h3 class="pro-price">$ 869.00</h3>
                            </div>
                        </div>
                        <!-- product-item end -->
                        <!-- product-item start -->
                        <div class="product-item">
                            <div class="product-img">
                                <a href="single-product.html">
                                <img src="{{ asset('img/products/12.jpg') }}" alt=""/>
                                </a>
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">
                                    <a href="single-product.html">Product Name</a>
                                </h6>
                                <h3 class="pro-price">$ 869.00</h3>
                            </div>
                        </div>
                        <!-- product-item end -->                               
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->
</div>
<!-- End page content -->

@stop

@section('extra-js')
    <script>
        $(function(){
            // bind change event to select
            $('#sort').on('change', function () {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });

        
            
           $("#operatingSystem").is('checked', function () {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            }); 

            
            
        
 
        });

    </script>
@stop