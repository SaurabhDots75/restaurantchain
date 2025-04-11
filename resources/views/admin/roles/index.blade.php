@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <div class="role-management">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Roles</h2>
                </div>
                <div class="pull-right">
                    <button class="view-btn dropdown-toggle mr-2" type="button" data-bs-toggle="collapse" data-bs-target="#searchCollapse">
                        Search
                    </button>
                    @can('role-create')
                    <a class="view-btn" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus"></i> Create Role</a>
                    @endcan
                </div>
            </div>
        </div>
        @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
        @endsession

        <div class="collapse {{ request()->except('page') ? 'show' : '' }}" id="searchCollapse">
            <div class="card card-body">
                <form action="{{ route('admin.roles.index') }}" method="GET">
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ request('name') }}" placeholder="Enter name">
                        </div>
        
                    
                      
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-lg-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-search"></i> Search
                            </button>
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
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
                    <th>Sr No</th>
                    <th>Name</th>
                    {{-- <th>Status</th> --}}
                    <th>Created</th>
                    <th>Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $i + $loop->index + 1 }}</td>
                    <td>{{ $role->name }}</td>
                    {{-- <td>
                        <input type="checkbox" hidden="hidden" id="username">
                        <label class="switch" for="username"></label>
                    </td> --}}
                    <td>{{$role->created_at->format('d-M-Y h:i:s')}}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.roles.show',$role->id) }}"><i
                                class="fa-solid fa-eye"></i></a>
                        @can('role-edit')
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit', base64_encode($role->id)) }}"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        @endcan

                        @can('role-delete')
                            <a id="delete-record{{$role->id}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
{!! $roles->links('pagination::bootstrap-5') !!}


@endsection

@section('custom_js_scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', "[id^=delete-record]", function () {
            var index = parseInt($(this).attr("id").replace("delete-record", ''));
            // Show a confirmation dialog
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
                    // Make an AJAX request to delete the record
                    $.ajax({
                        url: "/admin/roles/destroy",  // URL to your deletion endpoint
                        type: 'POST',           // HTTP method (could also be DELETE)
                        data: {
                            _method: 'DELETE',  // Spoof the DELETE method
                            id: index,          // Pass the index or record ID to the server
                            _token: $('meta[name="csrf-token"]').attr('content')  // CSRF token for security
                        },
                        success: function(response) {
                            // Handle successful deletion
                            Swal.fire(
                                'Deleted!',
                                'The record has been deleted.',
                                'success'
                            );
                            Swal.fire(
                                'Deleted!',
                                'The record has been deleted.',
                                'success'
                            ).then(() => {
                                // Optionally, remove the record from the UI
                                window.location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle error if deletion fails
                            Swal.fire(
                                'Error!',
                                'There was an issue deleting the record.',
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