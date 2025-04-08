@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
<h2 class="card-header">Show Restaurant</h2>
<a class="view-btn" href="{{ route('admin.users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
<div class="showuser">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $restaurant->name }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Email:</strong> 
                    <span class="emailusername">{{ $restaurant->email }}</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Address:</strong> 
                    {{ $restaurant->address }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Phone:</strong> 
                    {{ $restaurant->phone }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Created At:</strong> 
                    {{ $restaurant->created_at->format('d-M-Y h:i:s A') }}
                </div>
            </div>
        </div>
</div>
</div>
    @endsection