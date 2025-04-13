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
                        <button class="view-btn dropdown-toggle mr-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#searchCollapse">
                            Search
                        </button>
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


            <div class="collapse {{ request()->except('page') ? 'show' : '' }}" id="searchCollapse">
                <div class="card card-body">
                    <form action="{{ route('admin.restaurants.index') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name"
                                    value="{{ request('name') }}">
                            </div>

                            <div class="col-lg-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter email"
                                    value="{{ request('email') }}">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter phone number"
                                    value="{{ request('phone') }}">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter address"
                                    value="{{ request('address') }}">
                            </div>


                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-search"></i> Search
                                </button>
                                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-secondary">
                                    <i class="la la-close"></i> Clear Search
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tablescroll-tableroll">
                <table class="management-table table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restaurants as $key => $restaurant)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $restaurant->name }}</td>
                                <td>{{ Str::lower($restaurant->email) }}</td>
                                <td>{{ $restaurant->phone }}</td>
                                <td>{{ $restaurant->address }}</td>
                                <td>
                                    <input type="checkbox" hidden="hidden" id="status_{{ $restaurant->id }}"
                                        class="toggle-status" data-id="{{ $restaurant->id }}"
                                        {{ $restaurant->is_active ? 'checked' : '' }}>
                                    <label class="switch" for="status_{{ $restaurant->id }}"></label>
                                </td>
                                <td>{{ $restaurant->created_at->format(config('constants.DATE_FORMAT')) }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('admin.restaurants.show', $restaurant->id) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.restaurants.edit', base64_encode($restaurant->id)) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a id="delete-recordrestaurant{{ $restaurant->id }}" href="javascript:void(0)"
                                        class="btn btn-danger btn-sm delete-btn">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('components.pagination', ['paginator' => $restaurants])
            </div>
        </div>
    </div>


@endsection
@section('custom_js_scripts')
    <script>
        $(document).ready(function() {
            $(document).on('change', '.toggle-status', function(e) {
                e.preventDefault();

                var checkbox = $(this);
                var id = checkbox.data('id');
                var newStatus = checkbox.is(':checked') ? 1 : 0;

                // Revert checkbox immediately until confirmed
                checkbox.prop('checked', !newStatus);

                Swal.fire({
                    title: 'Are you sure?',
                    text: `You are about to ${newStatus ? 'activate' : 'deactivate'} this restaurant.`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Re-check the box again after confirmation
                        checkbox.prop('checked', newStatus);

                        // Call your AJAX function
                        $.ajax({
                            url: "{{ route('admin.restaurants.toggle-status') }}", // adjust route
                            type: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id,
                                is_active: newStatus
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Updated!',
                                    'Restaurant status has been changed.',
                                    'success'
                                );
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                );
                                // Revert if error
                                checkbox.prop('checked', !newStatus);
                            }
                        });
                    }
                });
            });



            $(document).on('click', "[id^=delete-recordrestaurant]", function() {
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
                            url: "/admin/restaurants/destroy", // URL to your deletion endpoint
                            type: 'POST', // HTTP method (could also be DELETE)
                            data: {
                                _method: 'DELETE', // Spoof the DELETE method
                                id: index, // Pass the index or record ID to the server
                                _token: $('meta[name="csrf-token"]').attr(
                                    'content') // CSRF token for security
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
