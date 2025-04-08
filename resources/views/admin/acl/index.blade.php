@extends('admin.layouts.app')
@section('content')
<div class="dashboard-panel">
<div class="role-management">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Acl Management</h2>
            </div>


            
          
            <div class="pull-right">
                <button class="view-btn dropdown-toggle mr-2" type="button" data-bs-toggle="collapse" data-bs-target="#searchCollapse">
                    Search
                </button>
				<a href='{{route("admin.acl.create")}}' class="view-btn"> Add New Acl </a>
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
            <form action="{{ route('admin.users.index') }}" method="GET">
                <div class="row">
                    <div class="col-lg-3">
						<label>Status</label>
						<select name="parent_id" class ="form-control select2init">
							<option value="">Select Parent Name</option>
							@foreach($parent_list as $list)
						<option value="{{$list->parent_id}}">{{AclparentByName($list->parent_id)}}</option>
						 @endforeach
						</select>
                    </div>
                  
                    <div class="col-lg-3">
						<label>Title</label>
						<input type="text" class="form-control" name="title" placeholder="Title " value="{{$searchVariable['title'] ?? '' }}">
                    </div>

                  
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-search"></i> Search
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            <i class="la la-close"></i> Clear Search
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="tablescroll-tableroll">
    <table class="management-table table table-bordered">
		<tr>
			<th>Title</th>
			<th>Parent</th>
			<th>Active</th>
			<th>Actions</th>
		</tr>
		@foreach($modules as $module)
		<tr>
			<td>{{ $module->title }}</td>
			<td>{{ $module->parent?->title ?? ' ' }}</td>
			<td>
				@if($module->is_active)
					<span class="badge bg-success">Active</span>
				@else
					<span class="badge bg-secondary">Inactive</span>
				@endif
			</td>
			
			<td>
				<a class="btn btn-primary btn-sm" href="{{ route('admin.acl.edit', base64_encode($module->id)) }}">
					<i class="fa-solid fa-pen-to-square"></i>
				</a>

				<a id="delete-recordacl{{ $module->id }}" data-id="{{$module->id}}" href="javascript:void(0)" class="btn btn-danger btn-sm delete-btnacl">
					<i class="fa-solid fa-trash-can"></i>
				</a>

			</td>
		</tr>
	@endforeach
    </table>
</div>
</div>
</div>
{!! $modules->links('pagination::bootstrap-5') !!}

@endsection

@section('custom_js_scripts')

<script>

$(document).ready(function() {
    $('.delete-btnacl').click(function() {
        var recordId = $(this).data('id');
        var route = '{{ route('admin.acl.delete', ':id') }}'.replace(':id', recordId);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
					url: route,
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'The record has been deleted.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the record.',
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