@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <div class="role-management">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Role Management</h2>
                </div>
                <div class="pull-right">
                    @can('role-create')
                    <a class="view-btn" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus"></i> Create New
                        Role</a>
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
                    <th width="100px">Sr No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $i + $loop->index + 1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td><input type="checkbox" hidden="hidden" id="username">
                        <label class="switch" for="username"></label>
                    </td>
                    <td>{{$role->created_at->format('d-M-Y h:i:s')}}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.roles.show',$role->id) }}"><i
                                class="fa-solid fa-eye"></i></a>
                        @can('role-edit')
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit',$role->id) }}"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        @endcan

                        @can('role-delete')
                        <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}"
                            style="display:inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm deletion?');"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
{!! $roles->links('pagination::bootstrap-5') !!}


@endsection