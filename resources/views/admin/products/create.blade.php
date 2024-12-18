@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="content">
    <!-- Breadcrumbs-->

    <!-- DataTables Example -->
    <div class="dashboard-panel">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        <div class="role-management">
            <div class="content">
                <div class="pull-left">
                    <h2>Add Product</h2>
                </div>
                <div class="form-setting">
                    <form id="cmsForm" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label for="product_name">Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label for="product_name">Slug <span class="text-danger">*</span></label>
                                                <input type="text" id="slug" name="slug" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label for="product_name">Short Description</label>
                                                <textarea id="short_description" name="short_description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label for="product_name">Long Description <span class="text-danger">*</span></label>
                                                <textarea class="form-control" style="height:150px" name="long_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt">
                                <div class="card card-header">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label for="product_name">Meta Title</label>
                                            <input type="text" id="meta_title" name="meta_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label for="meta_keyword">Meta Keywords</label>
                                            <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label for="meta_keyword">Meta Description</label>
                                            <textarea id="meta_description" name="meta_description" class="form-control ckeditor"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="view-btn"> Submit</button>
                                        <a href="{{ route('admin.products.index') }}" class="view-btn"> Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection