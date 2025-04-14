@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="role-management">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{ isset($menuItem) ? 'Edit Food Item' : 'Create Food Item' }}</h2>
                    </div>
                    <div class="pull-right">
                        <a class="view-btn" href="{{ route('admin.menu-items.index') }}">
                            Back to Food Items
                        </a>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <form action="{{ isset($menuItem) ? route('admin.menu-items.update', $menuItem->id) : route('admin.menu-items.store') }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf
                        @if(isset($menuItem))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name', $menuItem->name ?? '') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                {{ old('category_id', $menuItem->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Restaurant</label>
                                    <select name="restaurant_id" class="form-control @error('restaurant_id') is-invalid @enderror" required>
                                        <option value="">Select Restaurant</option>
                                        @foreach($restaurants as $restaurant)
                                            <option value="{{ $restaurant->id }}" 
                                                {{ old('restaurant_id', $menuItem->restaurant_id ?? '') == $restaurant->id ? 'selected' : '' }}>
                                                {{ $restaurant->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('restaurant_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Menu</label>
                                    <select name="menu_id" class="form-control @error('menu_id') is-invalid @enderror" required>
                                        <option value="">Select Menu</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" 
                                                {{ old('menu_id', $menuItem->menu_id ?? '') == $menu->id ? 'selected' : '' }}>
                                                {{ $menu->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('menu_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" step="0.01" name="price" 
                                           class="form-control @error('price') is-invalid @enderror" 
                                           value="{{ old('price', $menuItem->price ?? '') }}" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Preparation Time (minutes)</label>
                                    <input type="number" name="preparation_time" 
                                           class="form-control @error('preparation_time') is-invalid @enderror" 
                                           value="{{ old('preparation_time', $menuItem->preparation_time ?? '') }}" required>
                                    @error('preparation_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                                              rows="3">{{ old('description', $menuItem->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Stock Quantity</label>
                                    <input type="number" name="stock_quantity" 
                                           class="form-control @error('stock_quantity') is-invalid @enderror" 
                                           value="{{ old('stock_quantity', $menuItem->stock_quantity ?? '') }}">
                                    @error('stock_quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Allergies (comma-separated)</label>
                                    <input type="text" name="allergies" 
                                           class="form-control @error('allergies') is-invalid @enderror" 
                                           value="{{ old('allergies', isset($menuItem->allergies) ? implode(', ', json_decode($menuItem->allergies)) : '') }}">
                                    @error('allergies')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h5 class="mb-3">Nutritional Information</h5>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Calories</label>
                                            <input type="number" name="nutritional_info[calories]" 
                                                   class="form-control" 
                                                   value="{{ old('nutritional_info.calories', isset($menuItem->nutritional_info) ? json_decode($menuItem->nutritional_info)->calories : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Protein (g)</label>
                                            <input type="number" step="0.1" name="nutritional_info[protein]" 
                                                   class="form-control" 
                                                   value="{{ old('nutritional_info.protein', isset($menuItem->nutritional_info) ? json_decode($menuItem->nutritional_info)->protein : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Carbohydrates (g)</label>
                                            <input type="number" step="0.1" name="nutritional_info[carbohydrates]" 
                                                   class="form-control" 
                                                   value="{{ old('nutritional_info.carbohydrates', isset($menuItem->nutritional_info) ? json_decode($menuItem->nutritional_info)->carbohydrates : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Fat (g)</label>
                                            <input type="number" step="0.1" name="nutritional_info[fat]" 
                                                   class="form-control" 
                                                   value="{{ old('nutritional_info.fat', isset($menuItem->nutritional_info) ? json_decode($menuItem->nutritional_info)->fat : '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="is_available" value="1" 
                                               {{ old('is_available', $menuItem->is_available ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label">Available</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="status" value="1" 
                                               {{ old('status', $menuItem->status ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($menuItem) ? 'Update' : 'Create' }} Menu Item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection