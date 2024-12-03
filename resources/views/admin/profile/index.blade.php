@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <h2>Edit User</h2>
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
<form method="POST" action="{{ route('admin.profile.update', auth()->user()->id) }}">
    @csrf

    <div class="edituserform-row">

            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ auth()->user()->name }}">
            </div>

           

            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" disabled placeholder="Email" class="form-control" value="{{ auth()->user()->email }}">
            </div>

            {{-- <div class="form-group">
                <strong>Profile Pic:</strong>
                @if(isset(auth()->user()->profile_pic))
                    <img src="{{url('/').'/images/profile/'.auth()->user()->profile_pic}}}" alt="">
                @endif
                <input type="file" name="profile_pic" placeholder="Profile Pic" class="form-control" value="">
            </div>
            <input type="hidden" name="profile_pic_bk" value="{{isset(auth()->user()->profile_pic)?auth()->user()->profile_pic:''}}"> --}}

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
                <p class="role">{{implode(', ',auth()->user()->getRoleNames()->toArray()) }}</p>
            </div>
        </div>
        <div class="btnsubmit">
            <button type="submit" class="view-btn"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            <a href="{{ route('admin.home') }}" class="view-btn"><i class="fa-solid fa-floppy-disk"></i> Cancel</a>
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
</script>
@endsection