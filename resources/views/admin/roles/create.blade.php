@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Role</h2>
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
    <div class="create-roll">
        <form method="POST" action="{{ route('admin.roles.store') }}">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" placeholder="Name" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <h3>Permission:</h3>
                        <div class="createroll-checkbox">
                            @foreach($permission as $value)
                            <label><input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}"
                                    class="name">
                                {{ $value->name }}</label>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="desk-mt">
                    <button type="submit" class="view-btn desk-mr"> Submit</button>
                    <a href="{{ route('admin.roles.index') }}" class="view-btn"> Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection