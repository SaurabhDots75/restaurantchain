@extends('admin.layouts.app')
 
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Add New User</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                id="inputName"
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
            <input
                type="text"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                id="inputEmail"
                placeholder="Email">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label"><strong>Password:</strong></label>
            <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                id="inputPassword"
                placeholder="Password">
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputConfPassword" class="form-label"><strong>Confirm Password:</strong></label>
            <input
                type="password"
                name="confirm-password"
                class="form-control @error('confirm-password') is-invalid @enderror"
                id="inputConfPassword"
                placeholder="Password">
            @error('confirm-password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputRole" class="form-label"><strong>Type:</strong></label>
            <input
                type="text"
                name="type"
                class="form-control @error('type') is-invalid @enderror"
                id="inputType"
                placeholder="Type">
            @error('type')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>
  
  </div>
</div>
@endsection