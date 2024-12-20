@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
<h2 class="card-header">Show Product</h2>
<a class="view-btn" href="{{ route('admin.product-pages.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
<div class="showuser">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                {{ $product->slug }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Short Description:</strong>
                {{ $product->slug }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->long_description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Title:</strong>
                {{ $product->meta_title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Keywords:</strong>
                {{ $product->meta_keywords }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Description:</strong>
                {{ $product->meta_description }}
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Upload:</strong>
                <input type="file" name="image_upload" id="image_upload">
            </div>
        </div> -->
    </div>
</div>
</div>
@endsection