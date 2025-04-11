@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
<h2 class="card-header">Show Staff Information</h2>
<a class="view-btn" href="{{ route('admin.staff.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
<div class="showuser">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Email:</strong> 
                    <span class="emailusername">{{ $user->email }}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Roles:</strong>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label>{{ $v }}</label>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
</div>
</div>
    @endsection