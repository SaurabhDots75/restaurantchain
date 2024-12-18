@extends('admin.layouts.app')

@section('content')
<!-- Main content -->
<div class="dashboard-panel">
    <div class="role-management">
        <section class="content">
            <div class="container-fluid">
                <div class="pull-left">
                    <h2>Products</h2>
                </div>
                <div class="pull-right">
                    @can('product-create')
                    <a class="view-btn" href="{{ route('admin.products.create') }}">Add Product</a>
                    @endcan
                </div>
            </div>

            @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
            @endsession
            <div class="tablescroll-tableroll">
                <table id="example2" class="management-table table table-bordered table-hover">
                    <tr>
                        <th scope="col">Sr No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Featured</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ (($product->is_featured == 1)?'Featured':'Not Featured') }}</td>
                        <td>{{ $product->long_description }}</td>
                        <td>
                            <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.products.show',$product->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                @can('product-edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.products.edit',$product->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @endcan

                                @csrf
                                @method('DELETE')

                                @can('product-delete')
                                <a id="delete-record{{$product->id}}" type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                                @endcan
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

                {!! $products->links() !!}

            </div>
            <!-- /.card-body -->
            <!-- /.col -->
            <!-- /.container-fluid -->
        </section>
    </div>
</div>
@endsection
@section('custom_js_scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', "[id^=delete-record]", function() {
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
                        url: "/admin/products/destroy", // URL to your deletion endpoint
                        type: 'POST', // HTTP method (could also be DELETE)
                        data: {
                            _method: 'DELETE', // Spoof the DELETE method
                            id: index, // Pass the index or record ID to the server
                            _token: $('meta[name="csrf-token"]').attr('content') // CSRF token for security
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