@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
<div class="row">
    <div class="col-lg-12 margin-tb">
            <h2>Edit User</h2>
        <div class="pull-left">
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
<form method="POST" action="{{ route('admin.users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <div class="edituserform-row">

            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" placeholder="Email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" placeholder="Password" class="form-control">
                <span class="input-icon show-password"><i class="fa-solid fa-eye"></i></span>
            </div>
            <div class="form-group">
                <strong>Confirm Password:</strong>
                <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                <span class="input-icon show-password"><i class="fa-solid fa-eye"></i></span>
            </div>
            <div class="form-group">
                <strong>Role:</strong>
                <select name="roles[]" class="form-control" id="multiple" multiple="multiple">
                    @foreach ($roles as $value => $label)
                        <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : ''}}>
                            {{ $label }}
                        </option>
                     @endforeach
                </select>
            </div>
        <div class="btnsubmit">
            <button type="submit" class="view-btn"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>
</div>
</div>
@endsection
@section('custom_js_scripts')
<script>
        $("#multiple").select2({
            placeholder: "Select Role",
            allowClear: true
        });
        $(document).ready(function() {
            $("span.select2-selection__clear").remove();
            $('.show-password').on('click', function(e) {
                var target = e.currentTarget;
                $(target).hasClass('show') ? hidePassword($(target)) : showPassword($(target));
            });
        });

        function hidePassword(e) {
            // Correctly find the icon within the target element (the show-password span)
            var icon = e.find('svg');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
            e.removeClass('show').addClass('hide');
            e.prev('input').attr('type', 'password');
        }

        function showPassword(e) {
            // Correctly find the icon within the target element (the show-password span)
            var icon = e.find('svg');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
            e.removeClass('hide').addClass('show');
            e.prev('input').attr('type', 'text');
        }
</script>
@endsection