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
            <h2>Categories</h2>
         </div>
         <div class="pull-right">
            <a class="view-btn" href="{{asset('admin/products/categories/create')}}">Add Category</a>
         </div>
         <!-- /.card-header -->
         <div class="tablescroll-tableroll">
            <table id="categoryTable" class="management-table table table-bordered table-hover">
               <thead>
                  <tr>
                     <th scope="col">Sr No</th>
                     <th scope="col">Title</th>
                     <th scope="col">Slug</th>
                     <th scope="col">Parent</th>
                     <th scope="col">Created</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($getData as $key => $value)
                  <tr>
                     <td>{{ $i + $loop->index + 1 }}</td>
                     <td>{{$value->title}}</td>
                     <td>{{$value->slug}}</td>
                     <td>{{$value->parent_details}}</td>
                     <td>{{$value->created_at->format('d-M-Y h:i:s')}}</td>
                     <td>
                        <a title="Edit" href="{{asset('admin/products/categories/create/'.$value->slug)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit " aria-hidden="true"></i></a>
                        <a id="delete-record{{$value->id}}" title="Delete Role" type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
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
                  url: "/admin/products/delete-categories", // URL to your deletion endpoint
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