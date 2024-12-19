@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
   <div class="role-management">
      <div class="content">
         <div class="pull-left">
            <h2>Attributes</h2>
         </div>
         <div class="pull-right">
            <a class="view-btn" href="{{ route('admin.products.product-attributes.create') }}">Add Attribute</a>
         </div>
         <div class="tablescroll-tableroll">
            <table class="management-table table table-bordered table-hover">
               <thead>
                     <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Variations</th>
                        <th scope="col">Actions</th>
                     </tr>
               </thead>
               <tbody>
                     @foreach ($attributes as $attribute)
                     <tr>
                        <td>{{ $i + $loop->index + 1 }}</td>
                        <td>{{ $attribute->name }}</td>
                        <td>{{ $attribute->description }}</td>
                        <td>
                           @foreach ($attribute->variations as $variation)
                                 <span class="badge bg-secondary">{{ $variation->value }}</span>
                           @endforeach
                        </td>
                        <td>
                           <a href="{{ route('admin.products.product-attributes.edit', $attribute->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit " aria-hidden="true"></i></a>
                           <a id="delete-record{{$attribute->id}}" title="Delete Role" type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                     </tr>
                     @endforeach
               </tbody>
            </table>
         </div>
      </div>
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
                  url: "/admin/products/product-attributes/destroy", // URL to your deletion endpoint
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