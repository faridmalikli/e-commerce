@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
        <h1>Categories</h1>
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
                        <h5>View Categories</h5>
                    </div>
                    <div class="widget-content nopadding">
                    
                        <table class="table table-bordered data-table">
                        
                            <thead>
                                <tr>
                                    <th>Category Id</th>
                                    <th>Category Name</th>
                                    <th>Category Level</th>
                                    <th>Category Slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @foreach ($categories as $category)
                            <tbody>
                                <tr class="gradeX">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->parent_id }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td class="center">
                                        <a href="{{ route('admin.editCategory', $category->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                        {{-- <a href="{{ route('admin.deleteCategory', $category->id) }}" class="delCat btn btn-danger btn-mini">Delete</a> --}}
                                        <a href="javascript:" rel = "{{ $category->id }}" rel1="delete-category" class="btn btn-danger btn-mini deleteRecord">Delete</a>
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