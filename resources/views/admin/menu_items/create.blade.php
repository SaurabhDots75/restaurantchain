@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create Food Item</h2>
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
            <form method="POST" action="{{ route('admin.food_items.store') }}" enctype="multipart/form-data">
                @csrf
            
                <div class="edituserform-row">
                    <div class="form-group mb-3">
                        <label><strong>Name</strong></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}">
                    </div>
            
                    @if (isset($restaurants) && count($restaurants))
                        <div class="form-group mb-3">
                            <label><strong>Restaurant</strong></label>
                            <select name="restaurant_id" class="form-control">
                                <option value="">Select Restaurant</option>
                                @foreach ($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}" {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                                        {{ $restaurant->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif
            
                    <div class="form-group mb-3">
                        <label><strong>Category</strong></label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="form-group mb-3">
                        <label><strong>Menu</strong></label>
                        <select name="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="form-group mb-3">
                        <label><strong>Price</strong></label>
                        <input type="number" name="price" class="form-control" placeholder="Enter price" value="{{ old('price') }}">
                    </div>
            
                 
            
                    <div class="form-group mb-3">
                        <label><strong>Image</strong></label>
                        <input type="file" name="image" class="form-control">
                    </div>
            
                    <div class="form-group mb-3">
                        <label><strong>Vegetarian</strong></label>
                        <select name="is_veg" class="form-control">
                            <option value="1" {{ old('is_veg') == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('is_veg') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
            
                    <div class="form-group mb-3">
                        <label><strong>Preparation Time (in minutes)</strong></label>
                        <input type="number" name="preparation_time" class="form-control" placeholder="Enter preparation time in minutes" value="{{ old('preparation_time') }}">
                    </div>
            
                    <div class="form-group mb-3">
                        <label><strong>Stock Quantity</strong></label>
                        <input type="number" name="stock_quantity" class="form-control" placeholder="Enter stock quantity" value="{{ old('stock_quantity') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Description</strong></label>
                        <textarea name="description" class="form-control" placeholder="Enter description" rows="4">{{ old('description') }}</textarea>
                    </div>
                </div>
            
                <button type="submit" class="view-btn">Submit</button>
                <a href="{{ route('admin.food_items.index') }}" class="view-btn">Cancel</a>
            </form>
            
        </div>
    </div>
@endsection
