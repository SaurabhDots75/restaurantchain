@extends('admin.layouts.app')
@section('content')


<div class="dashboard-panel">
    <div class="role-management">
        <div class="content">
            <div class="pull-left">
                <h2>Faq</h2>
            </div>
            <div class="pull-right">
                <a class="view-btn" href="{{ url('admin/faqs/create') }}" class="btn btn-primary">Add Faq</a>
            </div>

            <div class="tablescroll-tableroll">
                <table class="management-table table table-bordered">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Category Name</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $key => $faq)
                        <tr class="{{$faq->is_deleted ? 'bg-danger' : '' }}">
                            <td>{{ $i + $loop->index + 1 }}</td>
                            <td>{{ isset($faq->category_name)?$faq->category_name:'No Category' }}</td>
                            <td>{{ $faq->title }}</td>
                            <td>
                                <?php echo html_entity_decode($faq->description); ?>
                            </td>
                            <td>{{ $faq->created_at->format('d-M-Y h:i:s')}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" title="Edit FAQ" href="{{ route('admin.faqs.edit', base64_encode($faq->id)) }}"><i class="fa fa-edit " aria-hidden="true"></i></a>
                                <a id="delete-record{{$faq->id}}" title="Delete FAQ" type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-container float-right">
                    {!! $faqs->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
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
                        url: "/admin/faqs/destroy",  // URL to your deletion endpoint
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