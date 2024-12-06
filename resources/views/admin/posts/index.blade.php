@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<div class="dashboard-panel">
   <div class="role-management">
      <section class="content">
         <div class="container-fluid">
            <div class="pull-left">
               <h2>Posts</h2>
            </div>
            <div class="pull-right">
               <a class="view-btn" href="{{ route('admin.posts.create')}}">Add New Blog</a>
            </div>
            <!-- /.card-header -->
            <div class="tablescroll-tableroll">
               <table id="example2" class="management-table table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th scope="col">Sr No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Created</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($posts as $key => $post)

                     <tr class="<?php if($post->status == 0){ echo " bg-danger"; } ?>" >
                        <td>{{ $i + $loop->index + 1 }}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->created_at->format('d-M-Y h:i:s')}}</td>
                        <td>
                           <a class="btn btn-primary btn-sm" title="Edit"
                              href="{{ route('admin.posts.edit', base64_encode($post->id)) }}"><i class="fa fa-edit "
                                 aria-hidden="true"></i></a>
                              <a id="delete-record{{$post->id}}" type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                           </form>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <!-- /.card-body -->
            <!-- /.col -->
         </div>
         <!-- /.container-fluid -->
      </section>
   </div>
</div>
<!-- /.content -->
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
                        url: "/admin/posts/destroy",  // URL to your deletion endpoint
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