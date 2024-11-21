@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Role</h2>
            </div>
            <div class="pull-right">
                <a class="view-btn" href="{{ route('admin.roles.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="show-role">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="role-name">
                    <strong>Role:</strong>
                    <span>{{ $role->name }}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }}</label>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection