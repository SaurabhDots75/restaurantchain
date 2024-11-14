@extends('admin.layouts.app')
 
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Add New Roles</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('admin.roles.store') }}" method="POST">
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
            <label for="inputSlug" class="form-label"><strong>Slug:</strong></label>
            <input
                type="text"
                name="slug"
                class="form-control @error('slug') is-invalid @enderror"
                id="inputSlug"
                placeholder="Slug">
            @error('slug')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputType" class="form-label"><strong>Type:</strong></label>
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