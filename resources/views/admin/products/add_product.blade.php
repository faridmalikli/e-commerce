@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Validation</a> </div>
    <h1>Add Product</h1>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ route('admin.addProduct') }}"  name="add_product" id="add_product" novalidate="novalidate">
              {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Under Category</label>
                <div class="controls">
                  <select name="category_id" style="width:220px;">
                    {!! $categories_dropdown !!}
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Slug</label>
                <div class="controls">
                  <input type="text" name="product_slug" id="product_slug">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Code</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Details</label>
                <div class="controls">
                  <input type="text" name="product_details" id="product_details">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="product_price" id="product_price">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="product_description" id="product_description"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Operating System</label>
                <div class="controls">
                  <input type="text" name="operating_system" id="operating_system">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Quantity</label>
                <div class="controls">
                  <input type="number" min="0" name="product_quantity" id="product_quantity">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label></label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                </div>
              </div>
              <div class="control-group">
                <label for="checkboxes" class="control-label">Featured</label>
                <div class="controls">
                  <div data-toggle="buttons-radio" class="btn-group">
                    <button class="btn btn-primary" type="button" name="yesButton">Yes</button>
                    <button class="btn btn-primary active" type="button" name="noButton">No</button>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection