@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="role-management">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Menu Items</h2>
                    </div>
                    <div class="pull-right">
                        <button class="view-btn dropdown-toggle mr-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#searchCollapse">
                            Search
                        </button>
                        <a class="view-btn" href="{{ route('admin.menu-items.create') }}">
                            Create Menu Item
                        </a>
                    </div>
                </div>
            </div>

            <div class="collapse {{ request()->except('page') ? 'show' : '' }}" id="searchCollapse">
                <div class="card card-body">
                    <form action="{{ route('admin.menu-items.index') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="form-label">Item Name</label>
                                <input type="text" name="name" class="form-control" value="{{ request('name') }}"
                                    placeholder="Enter item name">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Restaurant</label>
                                <select name="restaurant_id" class="form-control">
                                    <option value="">All Restaurants</option>
                                    @foreach($restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}" {{ request('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                                            {{ $restaurant->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Availability</label>
                                <select name="is_available" class="form-control">
                                    <option value="">All</option>
                                    <option value="1" {{ request('is_available') == '1' ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ request('is_available') == '0' ? 'selected' : '' }}>Unavailable</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">All</option>
                                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-search"></i> Search
                                </button>
                                <a href="{{ route('admin.menu-items.index') }}" class="btn btn-secondary">
                                    <i class="la la-close"></i> Clear Search
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tablescroll-tableroll mt-4">
                <table class="management-table table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Availability</th>
                            <th>Status</th>
                            <th>Restaurant</th>
                            <th>Menu</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menuItems as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>
                                    @if ($item->is_available)
                                        <span class="badge bg-success">Available</span>
                                    @else
                                        <span class="badge bg-warning">Unavailable</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $item->restaurant->name }}</td>
                                <td>{{ $item->menu->name }}</td>
                                <td>
                                    <a href="{{ route('admin.menu-items.edit', $item->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" 
                                        data-bs-target="#itemDetailsModal{{ $item->id }}">
                                        Details
                                    </button>
                                    <form action="{{ route('admin.menu-items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" 
                                            onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Item Details Modal -->
                            <div class="modal fade" id="itemDetailsModal{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $item->name }} - Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6>Description</h6>
                                                    <p>{{ $item->description }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6>Preparation Time</h6>
                                                    <p>{{ $item->preparation_time }} minutes</p>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <h6>Allergies</h6>
                                                    <ul>
                                                        @if($item->allergies)
                                                            @foreach(json_decode($item->allergies) as $allergy)
                                                                <li>{{ $allergy }}</li>
                                                            @endforeach
                                                        @else
                                                            <li>No allergy information available</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6>Nutritional Information</h6>
                                                    @if($item->nutritional_info)
                                                        @php $nutrition = json_decode($item->nutritional_info, true) @endphp
                                                        <ul>
                                                            <li>Calories: {{ $nutrition['calories'] ?? 'N/A' }}</li>
                                                            <li>Protein: {{ $nutrition['protein'] ?? 'N/A' }}g</li>
                                                            <li>Carbohydrates: {{ $nutrition['carbohydrates'] ?? 'N/A' }}g</li>
                                                            <li>Fat: {{ $nutrition['fat'] ?? 'N/A' }}g</li>
                                                        </ul>
                                                    @else
                                                        <p>No nutritional information available</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>

                @include('components.pagination', ['paginator' => $menuItems])
            </div>
        </div>
    </div>
@endsection