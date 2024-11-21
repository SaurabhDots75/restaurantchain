@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Setting</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('admin.home') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if (isset($setting))
    <form method="POST" action="{{ route('admin.setting.update', $setting->id) }}" enctype="multipart/form-data">
    @method('PUT')
@else
    <form method="POST" action="{{ route('admin.setting.store') }}" enctype="multipart/form-data">
@endif
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" id="title" value="{{isset($setting->title)?$setting->title:''}}" placeholder="Title" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" id="email" value="{{isset($setting->email)?$setting->email:''}}" placeholder="Email" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                <input type="text" name="phone" id="phone" value="{{isset($setting->phone)?$setting->phone:''}}" placeholder="Phone" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <Textarea class="form-control" name="address" id="address">
                    {{isset($setting->address)?$setting->address:''}}
                </Textarea>
            </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong>
                <input type="file" name="logo_url" id="logo_url" value="{{isset($setting->logo_url)?$setting->logo_url:''}}" placeholder="Logo Url" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Favicon Logo:</strong>
                <input type="file" name="favicon_url" id="favicon_url" value="{{isset($setting->favicon_url)$setting->favicon_url:''}}" placeholder="Logo Url" class="form-control">
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>


@endsection