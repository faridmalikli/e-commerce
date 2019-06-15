@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Validation</a> </div>
    <h1>Products Attributes</h1>
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
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product Attribute</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ route('admin.addAttributes', $productDetails->id) }}"  name="add_attributes" id="add_attributes" novalidate="novalidate">
              {{ csrf_field() }}
              <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
              <div class="control-group">
                <label class="control-label">Name</label>
                <label class="control-label"><strong>{{ $productDetails->name }}</strong></label>
              </div>
              <div class="control-group">
                <label class="control-label">Code</label>
                <label class="control-label"><strong>{{ $productDetails->code }}</strong></label>
              </div> 
              <div class="control-group">
                <label class="control-label">Operating System</label>
                <label class="control-label"><strong>{{ $productDetails->operating_system }}</strong></label>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="field_wrapper">
                    <div>
                        <input type="text" name="color[]" id="color" placeholder="Color" style="width:120px;" />
                        <input type="text" name="size[]" id="size" placeholder="Size" style="width:120px;" />
                        <input type="text" name="price[]" id="price" placeholder="Price" style="width:120px;" />
                        <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;" />
                        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                    </div>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Attributes" class="btn btn-success">
              </div> 
            </form>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>View Attributes</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Attribute Id</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($product_attributes as $attribute)
                        <tbody>
                            <tr class="gradeX">
                                <td>{{ $attribute->id }}</td>
                                <td>{{ $attribute->color }}</td>
                                <td>{{ $attribute->size }}</td>
                                <td>{{ $attribute->price }}</td>
                                <td>{{ $attribute->stock }}</td>
                                <td class="center">
                                    <a href="javascript:" rel="{{ $attribute->id }}" rel1="delete-attribute" class="btn btn-danger btn-mini deleteRecord">Delete</a> {{-- href="{{ route('admin.deleteProduct', $product->id) }}" --}}
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
