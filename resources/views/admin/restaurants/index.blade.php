@extends('admin.layouts.app')
@section('content')
<div class="dashboard-panel">
<div class="role-management">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Restaurant Management</h2>
            </div>
            <div class="pull-right">
                <a class="view-btn" href="{{ route('admin.restaurants.create') }}">
                    Create Restaurant</a>
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
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $key => $restaurant)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->address }}</td>
                    <td>{{ $restaurant->phone }}</td>
                    <td>{{ Str::lower($restaurant->email) }}</td>
                    <td>{{ $restaurant->created_at->format('d-M-Y h:i:s') }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.restaurants.show', $restaurant->id) }}">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.restaurants.edit', base64_encode($restaurant->id)) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a id="delete-recordrestaurant{{ $restaurant->id }}" href="javascript:void(0)" class="btn btn-danger btn-sm delete-btn">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
{!! $restaurants->links('pagination::bootstrap-5') !!}

@endsection
@section('custom_js_scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', "[id^=delete-recordrestaurant]", function () {
            var index = parseInt($(this).attr("id").replace("delete-recordrestaurant", ''));

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
                        url: "/admin/restaurants/destroy",  // URL to your deletion endpoint
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