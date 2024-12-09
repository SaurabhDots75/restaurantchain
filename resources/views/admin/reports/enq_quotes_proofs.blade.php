@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <div class="role-management">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Quotes and Proofs Reports</h2>
                </div>
                <div class="pull-right">
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
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Project Type</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
                @foreach ($getEnqReport as $key => $report)
                <tr>
                    <td>{{ $i + $loop->index + 1 }}</td>
                    <td>{{ (isset($report->first_name)?$report->first_name:'').' '.(isset($report->last_name)?$report->last_name:'') }}</td>
                    <td>{{ $report->company_name }}</td>
                    <td>{{ $report->email }}</td>
                    <td>{{ $report->mobile }}</td>
                    <td>{{ (isset($report->city)$report->city:'').'<br>'.(isset($report->state)?$report->state:'') }}</td>
                    <td>{{ $report->project_type }}</td>
                    <td>{{$report->created_at->format('d-M-Y h:i:s')}}</td>
                    <td>
                        @can('role-delete')
                            <a id="delete-record{{$report->id}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
{!! $getEnqReport->links('pagination::bootstrap-5') !!}


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
                        url: "/admin/reports/proofs-quotes-report",  // URL to your deletion endpoint
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