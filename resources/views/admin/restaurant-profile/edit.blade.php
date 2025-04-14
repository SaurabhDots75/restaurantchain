@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Restaurant Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.restaurant.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Profile</li>
    </ol>

    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Restaurant Profile</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.restaurant-profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Restaurant Name</label>
                        <input type="text" name="name" id="name" class="form-control" 
                               value="{{ old('name', $restaurant->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="website_url" class="form-label">Website URL</label>
                        <input type="url" name="website_url" id="website_url" class="form-control"
                               value="{{ old('website_url', $restaurant->website_url) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" rows="3" required>{{ old('address', $restaurant->address) }}</textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="opening_time" class="form-label">Opening Time</label>
                        <input type="time" name="opening_time" id="opening_time" class="form-control"
                               value="{{ old('opening_time', $restaurant->opening_time) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="closing_time" class="form-label">Closing Time</label>
                        <input type="time" name="closing_time" id="closing_time" class="form-control"
                               value="{{ old('closing_time', $restaurant->closing_time) }}" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                        @if($restaurant->logo)
                            <div class="mt-2">
                                <img src="{{ Storage::url($restaurant->logo) }}" alt="Logo" class="img-thumbnail" width="120">
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cover_image" class="form-label">Cover Image</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control" accept="image/*">
                        @if($restaurant->cover_image)
                            <div class="mt-2">
                                <img src="{{ Storage::url($restaurant->cover_image) }}" alt="Cover" class="img-thumbnail" width="120">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
