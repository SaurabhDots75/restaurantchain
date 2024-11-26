@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                @can('user-create')
                <a class="view-btn" href="{{ route('admin.users.create') }}"><i class="fa fa-plus"></i>
                    Create New User</a>
                @endcan
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
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $key => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge bg-success">{{ $v }}</label>
                @endforeach
                @endif
            </td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('admin.users.show',$user->id) }}"><i
                        class="fa-solid fa-eye"></i></a>
                @can('user-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit',$user->id) }}"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                @endcan
                
                @if(isset($user->email) && $user->email != 'info@printit4less.com')
                    @if($user->id !== auth()->id())
                        @can('user-delete')
                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('You want to delete?');" @if($user->id === auth()->id()) disabled @endif><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                        @endcan
                    @endif
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
{!! $data->links('pagination::bootstrap-5') !!}

@endsection