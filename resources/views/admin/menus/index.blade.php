@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="role-management">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Menu </h2>
                    </div>
                    <div class="pull-right">
                        <button class="view-btn dropdown-toggle mr-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#searchCollapse">
                            Search
                        </button>
                        <a class="view-btn" href="{{ route('admin.menus.create') }}">
                            Create Menu
                        </a>
                    </div>
                </div>
            </div>

   

            <div class="collapse {{ request()->except('page') ? 'show' : '' }}" id="searchCollapse">
                <div class="card card-body">
                    <form action="{{ route('admin.menus.index') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="form-label">Menu Name</label>
                                <input type="text" name="name" class="form-control" value="{{ request('name') }}"
                                    placeholder="Enter menu name">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Status</label>
                                <select name="is_active" class="form-control">
                                    <option value="">All</option>
                                    <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-search"></i> Search
                                </button>
                                <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">
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
                            <th>Menu Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Available Time</th>
                            <th>Days Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menus as $index => $menu)
                            <tr>
                                <td>{{ $menus->firstItem() + $index }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ Str::limit($menu->description, 40) }}</td>
                                <td>
                                    @if ($menu->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $menu->start_time }} - {{ $menu->end_time }}</td>
                                <td>
                                    @if ($menu->days_active)
                                        {{ implode(', ', json_decode($menu->days_active)) }}
                                    @else
                                        All Days
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                        class="btn btn-sm btn-info">Edit</a>


                                    <button class="btn btn-danger btn-sm sweet-delete"
                                        data-url="{{ route('admin.menus.destroy', $menu->id) }}"
                                        data-token="{{ csrf_token() }}">
                                        Delete
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No menus found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @include('components.pagination', ['paginator' => $menus])
            </div>
        </div>
    </div>
@endsection
