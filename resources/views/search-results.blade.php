@extends('layout')

@section('title', 'Search')

@section('content')

@section('breadcrumb')
    <h1 class="breadcrumbs-title">Single Product</h1>
    <ul class="breadcrumb-list">
        <li><a href="/">Home</a></li>
        <li>Single Product</li>
    </ul>
@stop

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
    <!-- EARCH SECTION START -->
    <div class="search-section mb-80">
        <div class="container">
            <div class="row">
                <div class="container">
                    <h2 class="text-center mb-50">Search Result</h2>
                    <p>{{ $products->total() }} results(s) in '{{ request()->input('query') }}'</p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Product details</th>
                                <th>Product description</th>
                                <th>Product price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><a href="{{ route('shop.show', $product->slug ) }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->details }}</td>
                                    <td>{{ str_limit($product->description, 90) }}</td>
                                    <td>{{ $product->presentPrice() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $products->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SEARCH SECTION END -->             
</section>
<!-- End page content -->  

@stop

