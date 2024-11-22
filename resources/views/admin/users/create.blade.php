@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="view-btn" href="{{ route('admin.users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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
<div class="edituserform">
<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf

<div class="edituserform-row">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
                <strong>Confirm Password:</strong>
                <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
            </div>
            <div class="form-group">
                <strong>Role:</strong>
                <select name="roles[]" class="form-control" id="multiple" multiple="multiple">
                    @foreach ($roles as $value => $label)
                        <option value="{{ $value }}">
                            {{ $label }}
                        </option>
                     @endforeach
                </select>
        </div>
</div>
<button type="submit" class="view-btn"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
</form>
</div>
<p class="text-center text-primary"><small>Developed By Dotsquares</small></p>
</div>
@endsection
@section('custom_js_scripts')
<script>
    $("#multiple").select2({
        placeholder: "Select Role",
        allowClear: true
    });
</script>
@endsection