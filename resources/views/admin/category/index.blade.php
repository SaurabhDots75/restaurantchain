@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="role-management">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Categories</h2>
                    </div>
                    <div class="pull-right">
                        <button class="view-btn dropdown-toggle mr-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#searchCollapse">
                            Search
                        </button>
                        <a class="view-btn" href="{{ route('admin.category.create') }}">
                            Create Category
                        </a>
                    </div>
                </div>
            </div>

            <div class="collapse {{ request()->except('page') ? 'show' : '' }}" id="searchCollapse">
                <div class="card card-body">
                    <form action="{{ route('admin.category.index') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="form-label">Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{ request('name') }}"
                                    placeholder="Enter category name">
                            </div>
                            <div class="col-lg-4">
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
                                <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">
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
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    @if ($category->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @include('components.pagination', ['paginator' => $categories])
            </div>
        </div>
    </div>
@endsection
