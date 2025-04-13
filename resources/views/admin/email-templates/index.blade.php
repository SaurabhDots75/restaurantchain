@extends('admin.layouts.app')
@section('content')
<div class="dashboard-panel">
    <div class="role-management">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Email Templates  </h2>
                </div>
                <div class="pull-right">
                    <button class="view-btn dropdown-toggle mr-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#searchCollapse">
                        Search
                    </button>
                    @can('user-create')
                    <a href="{{ route('admin.email-templates.create') }}" class="view-btn">
                        Create New Template
                    </a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="collapse {{ request()->except('page') ? 'show' : '' }}" id="searchCollapse">
            <div class="card card-body">
                <form action="{{ route('admin.email-templates.index') }}" method="GET">
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="form-label">Template Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter template name"
                                value="{{ request('name') }}">
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="">-- Select Status --</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-search"></i> Search
                            </button>
                            <a href="{{ route('admin.email-templates.index') }}" class="btn btn-secondary">
                                <i class="la la-close"></i> Clear Search
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="tablescroll-tableroll">
            <table class="management-table table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                @foreach ($emailTemplates as $key => $template)
                <tr>
                    <td>{{ $emailTemplates->firstItem() + $key }}</td>
                    <td>{{ $template->name }}</td>
                    <td>{{ $template->subject }}</td>
                    <td>{{ $template->created_at->format(config('constants.DATE_FORMAT')) }}</td>
                    <td>
                    
                        @can('user-edit')
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.email-templates.edit', $template->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="toggleStatus({{ $template->id }})" 
                           class="btn {{ $template->is_active ? 'btn-success' : 'btn-warning' }} btn-sm">
                            <i class="fa-solid {{ $template->is_active ? 'fa-check' : 'fa-ban' }}"></i>
                        </a>
                        @endcan
                        @can('user-delete')
                        <a id="delete-record{{ $template->id }}" href="javascript:void(0)" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                        @endcan
                    </td>
                </tr>
                @endforeach

            </table>
            @include('components.pagination', ['paginator' => $emailTemplates])
        </div>
    </div>
</div>
@endsection
@section('custom_js_scripts')
<script>
    function toggleStatus(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to change the status of this template?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ url("admin/email-templates") }}/' + id + '/toggle-status',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        Swal.fire(
                            'Updated!',
                            'Template status has been updated.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'Failed to update template status.',
                            'error'
                        );
                    }
                });
            }
        });
    }

    $(document).ready(function() {
        $(document).on('click', "[id^=delete-record]", function() {
            const id = parseInt($(this).attr("id").replace("delete-record", ''));
            const deleteUrl = '{{ url("admin/email-templates") }}/' + id;
            
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'The template has been deleted.',
                                'success'
                            ).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Failed to delete the template.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
@endsection