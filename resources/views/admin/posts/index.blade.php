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
                           <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}"
                              style="display:inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm"
                                 onclick="return confirm('Confirm deletion?');"><i
                                    class="fa-solid fa-trash-can"></i></button>
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