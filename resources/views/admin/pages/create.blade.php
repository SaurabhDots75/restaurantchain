@extends('admin.layouts.app')
@section('content')
<div class="content">
   <!-- Breadcrumbs-->

   <!-- DataTables Example -->
   <div class="dashboard-panel">
   <div class="role-management">
   <div class="content">

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

<div class="pull-left"><h2>Add Page</h2></div>
      <div class="form-setting">
         <form id="cmsForm" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="row">
               <div class="col-md-8">
                  <div class="card card-primary">
                     <div class="card-body">
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Title <span class="text-danger">*</span></label>
                              <input type="text" id="title" name="title" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Sub title</label>
                              <input type="text" id="subtitle" name="subtitle" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Slug <span class="text-danger">*</span></label>
                              <input type="text" id="slug" name="slug" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Short Description</label>
                              <textarea id="short_description" name="short_description" class="form-control"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 mt">
                  <div class="card card-header">
                     {{-- <div class="form-group">
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" id="image" name="image" class="custom-file-input" accept="image/*">
                           </div>
                        </div>
                     </div> --}}
                     @if(count($templates)>0)
                     <div class="form-group">
                        <label for="template">Choose Template</label>
                        <div class="form-label-group">
                           <select id="template" name="template" class="form-control">
                              @foreach($templates as $template)
                                 <option value="{{$template['value']}}" {{$template['value']=='default_template'?'selected':''}}>{{$template['name']}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     @endif
                     <div class="form-group">
                        <div class="form-label-group">
                           <label for="product_name">Meta Title</label>
                           <input type="text" id="meta_title" name="meta_title" class="form-control" >
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="form-label-group">
                           <label for="meta_keyword">Meta Keywords</label>
                           <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="form-label-group">
                           <label for="meta_keyword">Meta Description</label>
                           <textarea id="meta_description" name="meta_description" class="form-control ckeditor" ></textarea>
                        </div>
                     </div>
                    
                  </div>
               </div>
               <div class="col-md-12 desk-mt desk-md">
                  <div class="card card-primary">
                     <div class="card-body">
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Description <span class="text-danger">*</span></label>
                              <textarea id="description" name="description" class="form-control ckeditor"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                   <div class="form-group">
                     <button class="view-btn" type="submit" class="btn btn-primary float-right">Submit</button>
                     <a href="{{ route('admin.pages.index') }}" class="view-btn"> Cancel</a>
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