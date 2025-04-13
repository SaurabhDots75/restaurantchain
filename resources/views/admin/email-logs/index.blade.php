@extends('admin.layouts.app')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
   {{ Session::get('success') }}
   @php
   Session::forget('success');
   @endphp
</div>
@endif

<!-- Main content -->
<div class="dashboard-panel">
   <div class="role-management">
      <div class="content">
         <div class="pull-left">
            <h2>Email Logs</h2>
         </div>
         <!-- /.card-header -->
         <div class="tablescroll-tableroll">
            <table id="emailLogTable" class="management-table table table-bordered table-hover">
               <thead>
                  <tr>
                     <th scope="col">Sr No</th>
                     <th scope="col">Recipient</th>
                     <th scope="col">Subject</th>
                     <th scope="col">Template</th>
                     <th scope="col">Status</th>
                     <th scope="col">Sent At</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($emailLogs as $key => $log)
                  <tr>
                     <td>{{ $loop->index + 1 }}</td>
                     <td>{{$log->recipient_email}}</td>
                     <td>{{$log->subject}}</td>
                     <td>{{$log->template_name}}</td>
                     <td>
                        <span class="badge {{ $log->status == 'sent' ? 'badge-success' : 'badge-danger' }}">
                           {{ucfirst($log->status)}}
                        </span>
                     </td>
                     <td>{{$log->created_at->format('d-M-Y h:i:s')}}</td>
                     <td>
                        <a title="View Details" href="{{asset('admin/email-logs/view/'.$log->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a id="delete-record{{$log->id}}" title="Delete Log" type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- /.content -->
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
                  url: "/admin/email-logs/delete", // URL to your deletion endpoint
                  type: 'POST',
                  data: {
                     _method: 'DELETE',
                     id: index,
                     _token: $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function(response) {
                     Swal.fire(
                        'Deleted!',
                        'The email log has been deleted.',
                        'success'
                     ).then(() => {
                        window.location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     Swal.fire(
                        'Error!',
                        xhr.responseJSON.message,
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