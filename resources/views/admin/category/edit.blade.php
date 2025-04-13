@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2>Edit Category</h2>
        </div>
    </div>

    @if ($errors->any())
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
        <form method="POST" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="edituserform-row">
                <!-- Name -->
                <div class="form-group mb-3">
                    <label><strong>Name:</strong></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" placeholder="Enter category name">
                </div>

                <!-- Slug -->
                <div class="form-group mb-3">
                    <label><strong>Slug:</strong></label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}" placeholder="Optional: custom slug">
                </div>

                <!-- Description -->
                <div class="form-group mb-3">
                    <label><strong>Description:</strong></label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Enter description">{{ old('description', $category->description) }}</textarea>
                </div>

                <!-- Image -->
                <div class="form-group mb-3">
                    <label><strong>Image:</strong></label>
                    <input type="file" name="image" class="form-control">
                    @if ($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" style="max-width: 150px;" class="mt-2">
                    @endif
                </div>

           
            </div>

            <!-- Submit & Cancel -->
            <div class="btnsubmit">
                <button type="submit" class="view-btn">Update</button>
                <a href="{{ route('admin.category.index') }}" class="view-btn">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
