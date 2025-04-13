@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="role-management">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Subcategory</h2>
                    </div>
                    <div class="pull-right">
                        <a class="view-btn" href="{{ route('admin.subcategory.index') }}">Back</a>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.subcategory.update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $subcategory->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $subcategory->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Restaurant <span class="text-danger">*</span></label>
                            <select name="restaurant_id" class="form-control @error('restaurant_id') is-invalid @enderror" required>
                                <option value="">Select Restaurant</option>
                                @foreach($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}" {{ old('restaurant_id', $subcategory->restaurant_id) == $restaurant->id ? 'selected' : '' }}>
                                        {{ $restaurant->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('restaurant_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Image</label>
                            @if($subcategory->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $subcategory->image) }}" alt="Current Image" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                accept="image/*">
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                rows="4">{{ old('description', $subcategory->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="form-check">
                                <input type="checkbox" name="status" class="form-check-input" value="1"
                                    {{ old('status', $subcategory->status) ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Featured</label>
                            <div class="form-check">
                                <input type="checkbox" name="is_featured" class="form-check-input" value="1"
                                    {{ old('is_featured', $subcategory->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label">Mark as Featured</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
                                value="{{ old('sort_order', $subcategory->sort_order) }}">
                            @error('sort_order')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary">Update Subcategory</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection