@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="role-management">
            <div class="row mb-3">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <h2>Food Items</h2>
                    <div>
                        <button class="view-btn dropdown-toggle me-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#searchCollapse">
                            Search
                        </button>
                        <a class="view-btn" href="{{ route('admin.food_items.create') }}">
                            Create Food Item
                        </a>
                    </div>
                </div>
            </div>

            <div class="collapse {{ request()->except('page') ? 'show' : '' }}" id="searchCollapse">
                <div class="card card-body mb-4">
                    <form action="{{ route('admin.food_items.index') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <label class="form-label">Item Name</label>
                                <input type="text" name="name" class="form-control" value="{{ request('name') }}"
                                    placeholder="Enter item name">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-search"></i> Search
                                </button>
                                <a href="{{ route('admin.food_items.index') }}" class="btn btn-secondary">
                                    <i class="la la-close"></i> Clear Search
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tablescroll-tableroll">
                <table class="management-table table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menuItems as $key => $menuItem)
                            <tr>
                                <td>{{ $menuItems->firstItem() + $key }}</td>
                                <td>{{ $menuItem->name }}</td>
                                <td>{{ $menuItem->description ?? '—' }}</td>
                                <td>{{ $menuItem->category->name ?? '—' }}</td>
                                <td>£{{ number_format($menuItem->price, 2) }}</td>
                                <td>
                                    <span class="badge {{ $menuItem->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $menuItem->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.food_items.edit', $menuItem->id) }}"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-danger btn-sm sweet-delete"
                                        data-url="{{ route('admin.food_items.destroy', $menuItem->id) }}"
                                        data-token="{{ csrf_token() }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No menu items found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    @include('components.pagination', ['paginator' => $menuItems])
                </div>
            </div>
        </div>
    </div>
@endsection
