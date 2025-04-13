@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{ route('admin.lookups.create', $type) }}" class="btn btn-primary">
                        <i class="mdi mdi-plus-circle me-1"></i>Add {{ ucfirst($type) }}
                    </a>
                </div>
                <h4 class="page-title">{{ ucfirst($type) }} Lookups</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <form class="d-flex flex-wrap align-items-center" action="{{ route('admin.lookups.index', $type) }}" method="GET">
                                <div class="me-3">
                                    <input type="search" class="form-control my-1 my-lg-0" name="name" value="{{ isset($searchVariable['name']) ? $searchVariable['name'] : '' }}" placeholder="Search...">
                                </div>
                                <button type="submit" class="btn btn-primary my-1 my-lg-0">Search</button>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
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
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            {{ $lookups->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection