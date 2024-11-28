@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                 <div class="text-right">
                  <a href="{{ route('admin.posts.create')}}"><button type="button" class="btn btn-primary add-button">Add New Blog</button></a>
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th scope="col">Title</th>
                           <th scope="col">Slug</th>
                           <th scope="col">Category</th>
                           <th scope="col">Created</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($posts as $post)
						
						<tr  class="<?php if($post->status == 0){ echo "bg-danger"; }  ?>" >
                           <td>{{$post->title}}</td>
                           <td>{{$post->slug}}</td>
						    <td>{{isset($post->cat_details)?$post->cat_details:''}}</td>
                           <td>{{$post->created_at}}</td>
                           <td>
                              <a title="Edit" href="{{ route('admin.posts.edit', base64_encode($post->id)) }}"><i class="fa fa-edit " aria-hidden="true"></i></a>
                             <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}" style="display:inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm deletion?');"><i class="fa-solid fa-trash-can"></i></button>
                              </form>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <th scope="col">Title</th>
                           <th scope="col">Slug</th>
                           <th scope="col">Category</th>
                           <th scope="col">Created</th>
                           <th scope="col">Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
