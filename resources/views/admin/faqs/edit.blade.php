@extends('admin.layouts.app')
@section('content')
<div class="content">
   <!-- Breadcrumbs-->
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
   @if ($errors->has('status'))
   <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $errors->first('status') }}
   </div>
   @endif
   <!-- DataTables Example -->
   <section class="content">
      <div class="container-fluid">
         <form id="cmsForm" action="{{ route('admin.faqs.update', base64_encode($faqs->id)) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
               <div class="col-md-8">
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Edit Faq</h3>
                     </div>
                     <div class="card-body">
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Question</label>
                              <input type="text" id="title" name="title" value="{{ $faqs->title }}" class="form-control" placeholder="Faq Name">
                           </div>
                        </div>
                        
                        <div class="form-group">
                           <div class="form-label-group">
                               <label for="product_name">Answer</label>
							  <textarea id="description" name="description" class="form-control ckeditor" placeholder="Faq Description" >{{ $faqs->description }}</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card card-header">
                        
                    <div class="form-group">
                     <div class="form-label-group">
                     <label for="product_name">Categories</label>
                        <select name="categories" id="categories" class="form-control" >
                           @foreach($faqcategories as $cat)
                              <option value = {{ $cat->id }} {{ isset($faqs->categories) && $faqs->categories == $cat->id ? 'selected' : ''}} >{{ $cat->title }}</option>
                           @endforeach
                        </select>
                     </div>
               </div> 
                     <div class="form-group">
                        <div class="form-label-group">
                           <select id="status" name="status" class="form-control">
                              <option value="">Select Status</option>
                              <option value="1" {{ $faqs->status=='1' ? 'selected' : '' }} >Enable</option>
                              <option value="0" {{ $faqs->status=='0' ? 'selected' : '' }} >Disable</option>
                           </select>
                        </div>
                     </div>
                    
                     
                     <div class="form-group">
                        <button type="submit" class="view-btn">Submit</button>
                        <a href="{{ route('admin.faqs.index') }}" class="view-btn"> Cancel</a>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </section>
</div>
@endsection

