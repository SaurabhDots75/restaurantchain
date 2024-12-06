@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<?php
   if(isset($getData->categories) && $getData->categories != 0){
      $selectedParentId = $getData->categories;
	  
   }elseif(isset($getData->categories) && $getData->categories == 0){
      $selectedParentId = $getData->id;
   }else{
      $selectedParentId = null;
   }
?>
<div class="content">
   <!-- Breadcrumbs-->
   <!-- DataTables Example -->
   <div class="dashboard-panel">
   @if(session()->has('alert-danger'))
   <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('alert-danger') }}
   </div>
   @endif
   @if ($errors->has('title'))
   <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $errors->first('title') }}
   </div>
   @endif
   @if ($errors->has('description'))
   <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $errors->first('description') }}
   </div>
   @endif
   @if ($errors->has('slug'))
   <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $errors->first('slug') }}
   </div>
   @endif
   <div class="role-management">
   <div class="content">
   <div class="pull-left"><h2>Edit Post</h2></div>
   <div class="form-setting">
         <form action="{{ route('admin.posts.update',base64_encode($posts->id)) }}" enctype="multipart/form-data" method="post"  id="cmsForm">
            @csrf
            @method('PUT')
            <div class="row">
               <div class="col-md-8">
                  <div class="card card-primary">
                     <div class="card-body">
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Title <span class="text-danger">*</span></label>
                              <input type="text" id="title" name="title" value="{{ $posts->title }}" class="form-control" >
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Sub Title</label>
                              <input type="text" id="subtitle" name="subtitle" value="{{ $posts->subtitle }}" class="form-control" >
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Slug <span class="text-danger">*</span></label>
                              <input type="text" id="slug" name="slug" value="{{ $posts->slug }}" class="form-control" >
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Short Description</label>
                              <textarea id="short_description" name="short_description" class="form-control">{{ $posts->short_description }}</textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Description <span class="text-danger">*</span></label>
                              <textarea id="description" name="description" class="form-control ckeditor description" >{{ $posts->description }}</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 mt">
                  <div class="card card-header">
                    
                     <!-- <div class="form-group">
                        <div class="input-group">
                           @if(isset($posts->image) && !empty($posts->image))
                                 <img src="{{asset('storage').'/'.$posts->image}}" width="50px;">
                           @endif
                           <div class="custom-file">
                              <input type="file" id="image" name="image" value="{{ $posts->image }}" class="custom-file-input" accept="image/*">
                           </div>
                        </div>
                        <span><b>Note</b>: <span style="color: green; font-size:15px">Please upload image size 500 X 300</span></span>
                     </div> -->
                     <div class="form-group">
                        <div class="form-label-group">
                           <label for="product_name">Meta Title</label>
                           <input type="text" id="meta_title" name="meta_title" value="{{ $posts->meta_title }}" class="form-control">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="form-label-group">
                           <label for="meta_keyword">Meta Keywords</label>
                           <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" value="{{ $posts->meta_keyword }}">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="form-label-group">
                           <label for="meta_keyword">Meta Description</label>
                           <textarea id="meta_description" name="meta_description" class="form-control ckeditor" >{{ $posts->meta_description }}</textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="view-btn">Submit</button>
                        <a href="{{ route('admin.posts.index') }}" class="view-btn"> Cancel</a>
                     </div>
                  </div>
               </div>
            </div>
         </form>
         </div>
   </div>
</div>
</div>
</div>
@endsection