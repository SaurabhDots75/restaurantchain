@extends('admin.layouts.app')
 
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Role Management Systems</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('admin.roles.create') }}"> <i class="fa fa-plus"></i> Create New Role</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>slug</th>
                    <th>type</th>
                    <th>Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($roles as $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->slug }}</td>
                    <td>{{ $role->type }}</td>
                    <td>
                        <form action="{{ route('admin.roles.destroy',$role->id) }}" method="POST">
             
                            <a class="btn btn-info btn-sm" href="{{ route('admin.roles.show',$role->id) }}"><i class="fa-solid fa-list"></i> Show</a>
              
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
             
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $roles->links() !!}
  
  </div>
</div>
@endsection