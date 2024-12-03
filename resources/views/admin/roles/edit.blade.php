@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel edit-rolecheckbox">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
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

<form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $role->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h3>Permission:</h3>
                <div class="createroll-checkbox">
                    @foreach($permission as $value)
                        <label><input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}>
                        {{ $value->name }}</label>
                    @endforeach
                </div>
            </div>
        </div>
<div class="clearfix"></div>
        <div class="">
            <button type="submit" class="view-btn"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            <a href="{{ route('admin.roles.index') }}" class="view-btn"> Cancel</a>
        </div>
    </div>
</form>
</div>
@endsection