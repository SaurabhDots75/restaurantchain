@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create Category</h2>
                </div>
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
            <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="edituserform-row">
                    <div class="form-group mb-3">
                        <label><strong> Name:</strong></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter category name"
                            value="{{ old('name') }}">
                    </div>


                    @if (isset($restaurants) && count($restaurants))
                        <div class="form-group mb-3">
                            <label><strong>Restaurant:</strong></label>
                            <select name="restaurant_id" class="form-control">
                                <option value="">Select Restaurant</option>
                                @foreach ($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}"
                                        {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                                        {{ $restaurant->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group mb-3">
                        <label><strong>Image:</strong></label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Description:</strong></label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                    </div>

                   
                    {{-- Optional: If categories are linked to restaurants --}}


                </div>

                <button type="submit" class="view-btn">Submit</button>
                <a href="{{ route('admin.category.index') }}" class="view-btn">Cancel</a>
            </form>
        </div>
    </div>
@endsection
