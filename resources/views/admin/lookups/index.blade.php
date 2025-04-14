@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="role-management">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h4 class="page-title">{{ ucfirst($type) }} Management</h4>
                    </div>
                    <div class="pull-right">
                        <button class="view-btn dropdown-toggle mr-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#searchCollapse">
                            Search
                        </button>
                        <a href="{{ route('admin.lookups.create', $type) }}" class="view-btn">
                            <i class="mdi mdi-plus-circle me-1"></i>Add {{ ucfirst($type) }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="collapse {{ request()->except('page') ? 'show' : '' }}" id="searchCollapse">
                <div class="card card-body">
                    <form action="{{ route('admin.lookups.index', $type) }}" method="GET">
                        <div class="row">
                            <div class="me-3">
                                <input type="search" class="form-control my-1 my-lg-0" name="name" value="{{ isset($searchVariable['name']) ? $searchVariable['name'] : '' }}" placeholder="Search...">
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
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lookups as $key => $lookup)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $lookup->name }}</td>
                            <td>
                                <form action="{{ route('admin.lookups.update', [$type, $lookup->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="name" value="{{ $lookup->name }}">
                                    <input type="hidden" name="is_active" value="{{ $lookup->is_active ? '0' : '1' }}">
                                    <button type="submit" class="btn btn-sm {{ $lookup->is_active ? 'btn-success' : 'btn-danger' }} d-inline-flex align-items-center">
                                        <i class="mdi {{ $lookup->is_active ? 'mdi-check-circle' : 'mdi-close-circle' }} me-1"></i>
                                        {{ $lookup->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>{{ $lookup->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.lookups.edit', [$type, $lookup->id]) }}" class="btn btn-sm btn-info me-2">
                                        <i class="mdi mdi-square-edit-outline"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.lookups.destroy', [$type, $lookup->id]) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this lookup? This action cannot be undone.')">
                                            <i class="mdi mdi-delete"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @include('components.pagination', ['paginator' => $lookups])
            </div>
        </div>
    </div>
@endsection