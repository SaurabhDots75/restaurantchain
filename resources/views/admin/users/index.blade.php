@extends('admin.layouts.app')
@section('content')
<div class="dashboard-panel">
<div class="role-management">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users</h2>
            </div>
            <div class="pull-right">
                @can('user-create')
                <a class="view-btn" href="{{ route('admin.users.create') }}">
                    Create User</a>
                @endcan
            </div>
        </div>
    </div>
    @session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
    @endsession
    <div class="tablescroll-tableroll">
    <table class="management-table table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $key => $user)
        <tr>
            <td>{{ $i + $loop->index + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ Str::lower($user->email) }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge bg-success">{{ $v }}</label>
                @endforeach
                @endif
            </td>
            <td>{{ $user->created_at->format('d-M-Y h:i:s')}}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('admin.users.show',$user->id) }}"><i
                        class="fa-solid fa-eye"></i></a>
                @can('user-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit',$user->id) }}"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                @endcan
                {{-- @can('user-delete')
                    <a id="delete-record{{$user->id}}" href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                @endcan --}}
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
</div>
{!! $data->links('pagination::bootstrap-5') !!}

@endsection
@section('custom_js_scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', "[id^=delete-record]", function () {
            var index = parseInt($(this).attr("id").replace("delete-record", ''));
            console.log(index);

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
                        url: "/admin/users/destroy",  // URL to your deletion endpoint
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