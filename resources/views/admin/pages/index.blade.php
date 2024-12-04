@extends('admin.layouts.app')
@section('content')
<div class="dashboard-panel">
<div class="role-management">
    <div class="content">
    <div class="pull-left"><h2>Pages</h2></div>

                    @if (session()->has('alert-success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session()->get('alert-success') }}
                        </div>
                    @endif
                    <div class="pull-right">
                            <a href="{{ url('admin/pages/create') }}" class="view-btn">Add New Page</a>
                            <!--<a class="view-btn search" href="javascript:;"><i class="fa fa-search"></i></a>-->
                         </div>
                         <div class="tablescroll-tableroll">
                            <table id="" class="management-table table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($pages))
                                        @foreach ($pages as $key => $page)
                                            <tr class="{{ $page->is_deleted ? 'bg-danger' : '' }}"
                                                title="{{ $page->is_deleted ? 'This record is deleted' : '' }}">
                                                <td>{{ $i + $loop->index + 1 }}</td>
                                                <td>{{ $page->title }}</td>
                                                <td>{{ $page->slug }}</td>
                                                <td>{{ $page->created_at->format('d-M-Y h:i:s')}}</td>
                                                <td>
                                                    @if ($page->status == 1)
                                                        <!-- <a title="Change Status"
                                                            href="{{ url('admin/pages/status/' . base64_encode($page->id) . '/0') }}"><i
                                                                class="fa fa-check " aria-hidden="true"></i></a> -->
                                                    @else
                                                        <!-- <a title="Change Status"
                                                            href="{{ url('admin/pages/status/' . base64_encode($page->id) . '/1') }}"><i
                                                                class="fa fa-times " aria-hidden="true"></i></a> -->
                                                    @endif

                                                    <a title="Edit"
                                                        href="{{ route('admin.pages.edit', base64_encode($page->id)) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit " aria-hidden="true"></i></a>

                                                            <form method="POST" action="{{ route('admin.pages.destroy', $page->id) }}" style="display:inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm deletion?');"><i class="fa-solid fa-trash-can"></i></button>
                                                            </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="pagination-container float-right">
                                {{ $pages->appends($_GET)->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
</div>
    <!-- /.content -->
    </div>
    </div>
@endsection
