@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
        <h1>Products</h1>
    </div>
    @if (session()->has('error_message'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ session()->get('error_message') }}</strong>
        </div>
    @endif
    @if (session()->has('success_message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ session()->get('success_message') }}</strong>
        </div>
    @endif
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>View Products</h5>
                    </div>
                    <div class="widget-content nopadding">
                    
                        <table class="table table-bordered data-table">
                        
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Cateory Id</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Product Slug</th>
                                    <th>Product Code</th>
                                    <th>Product Details</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Product Operating System</th>
                                    <th>Product Quantity</th>
                                    <th>Product Faetured</th>
                                    <th>Product Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @foreach ($products as $product)
                            <tbody>
                                <tr class="gradeX">
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->category_id }}</td>
                                    <td>{{ $product->category_name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->details }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->operating_system }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->featured }}</td>
                                    <td>
                                        @if(!empty($product->image))
                                            <img src="{{ asset('public/images/backend_images/products/large/95729.jpg') }}">
                                        @endif
                                    </td>
                                    <td class="center">
                                        <a href="{{ route('admin.editProduct', $product->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                        <a href="{{ route('admin.deleteProduct', $product->id) }}" class="delCat btn btn-danger btn-mini">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection