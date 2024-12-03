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
   
   <!-- DataTables Example -->
   <section class="content">
      <div class="container-fluid">
      <form id="cmsForm" action="{{ route('admin.faqcategories.update', base64_encode($faqcategories->id)) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
               <div class="col-md-8">
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Edit Faq Category</h3>
                     </div>
                     <div class="card-body">
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Category</label>
                              <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{ $faqcategories->title }}" >
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card card-header">
                     
                     
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </section>
</div>
<!-- Sticky Footer -->

@endsection
