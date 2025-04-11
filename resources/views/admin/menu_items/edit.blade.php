@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h2>Edit Food Item</h2>
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
            <form method="POST" action="{{ route('admin.food_items.update', $menuItem->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="edituserform-row">
                    <!-- Name -->
                    <div class="form-group mb-3">
                        <label><strong>Name:</strong></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $menuItem->name) }}"
                            placeholder="Enter food item name">
                    </div>

                    <!-- Category -->
                    <div class="form-group mb-3">
                        <label><strong>Category:</strong></label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Menu -->
                    <div class="form-group mb-3">
                        <label><strong>Menu:</strong></label>
                        <select name="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}"
                                    {{ old('menu_id', $menuItem->menu_id) == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Restaurant -->
                    <div class="form-group mb-3">
                        <label><strong>Restaurant:</strong></label>
                        <select name="restaurant_id" class="form-control">
                            <option value="">Select Restaurant</option>
                            @foreach ($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}"
                                    {{ old('restaurant_id', $menuItem->restaurant_id) == $restaurant->id ? 'selected' : '' }}>
                                    {{ $restaurant->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price -->
                    <div class="form-group mb-3">
                        <label><strong>Price:</strong></label>
                        <input type="number" name="price" class="form-control"
                            value="{{ old('price', $menuItem->price) }}" placeholder="Enter price">
                    </div>



                    <!-- Image -->
                    <div class="form-group mb-3">
                        <label><strong>Image:</strong></label>
                        <input type="file" name="image" class="form-control">
                        @if ($menuItem->image)
                            <img src="{{ asset('storage/' . $menuItem->image) }}" alt="Food Image" class="mt-2"
                                style="max-width: 200px;">
                        @endif
                    </div>

                    <!-- Is Veg -->
                    <div class="form-group mb-3">
                        <label><strong>Vegetarian:</strong></label>
                        <select name="is_veg" class="form-control">
                            <option value="1" {{ old('is_veg', $menuItem->is_veg) == 1 ? 'selected' : '' }}>Yes
                            </option>
                            <option value="0" {{ old('is_veg', $menuItem->is_veg) == 0 ? 'selected' : '' }}>No
                            </option>
                        </select>
                    </div>

                    <!-- Preparation Time -->
                    <div class="form-group mb-3">
                        <label><strong>Preparation Time (in minutes):</strong></label>
                        <input type="number" name="preparation_time" class="form-control"
                            value="{{ old('preparation_time', $menuItem->preparation_time) }}"
                            placeholder="Enter preparation time">
                    </div>

                    <!-- Stock Quantity -->
                    <div class="form-group mb-3">
                        <label><strong>Stock Quantity:</strong></label>
                        <input type="number" name="stock_quantity" class="form-control"
                            value="{{ old('stock_quantity', $menuItem->stock_quantity) }}"
                            placeholder="Enter stock quantity">
                    </div>


                    <!-- Description -->
                    <div class="form-group mb-3">
                        <label><strong>Description:</strong></label>
                        <textarea name="description" class="form-control" placeholder="Enter description" rows="4">{{ old('description', $menuItem->description) }}</textarea>
                    </div>
                </div>

                <!-- Submit & Cancel -->
                <div class="btnsubmit">
                    <button type="submit" class="view-btn">Update</button>
                    <a href="{{ route('admin.food_items.index') }}" class="view-btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
