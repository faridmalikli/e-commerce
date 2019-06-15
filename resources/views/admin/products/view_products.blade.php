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
                                            <img src="{{ URL::to('/images/backend_images/products/small/'.$product->image) }}" style="width:50px;">
                                        @endif
                                    </td>
                                    <td class="center">
                                        <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                                        <a href="{{ route('admin.editProduct', $product->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                        <a href="{{ route('admin.addAttributes', $product->id) }}" class="btn btn-success btn-mini">Add</a>
                                        <a href="javascript:" rel="{{ $product->id }}" rel1="delete-product" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                        {{-- href="{{ route('admin.deleteProduct', $product->id) }}" --}}
                                    </td>
                                </tr>
                                <div id="myModal{{ $product->id }}" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>{{ $product->name }} Full Details</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>Product ID: {{ $product->id }}</p>
                                        <p>Category ID: {{ $product->category_id }}</p>
                                        <p>Category Name: {{ $product->category_name }}</p>
                                        <p>Product Name: {{ $product->name }}</p>
                                        <p>Product Slug: {{ $product->slug }}</p>
                                        <p>Product Code: {{ $product->code }}</p>
                                        <p>Product Details: {{ $product->details }}</p>
                                        <p>Product Price: {{ $product->price }}</p>
                                        <p>Product Description: {{ $product->description }}</p>
                                        <p>Product Operating System {{ $product->operating_system }}</p>
                                        <p>Product Quantity: {{ $product->quantity }}</p>
                                        <p>Product Featured: {{ $product->featured }}</p>
                                    </div>
                                </div>
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