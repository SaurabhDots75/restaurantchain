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
   <div class="dashboard-panel">
   <div class="role-management">
   <div class="content">
   <div class="pull-left"><h2>Add Faq Category</h2></div>
   <div class="form-setting">
         <form id="cmsForm" action="{{ route('admin.faqcategories.store') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="card card-primary">
                     <div class="card-body">
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Catgory</label>
                              <input type="text" id="title" name="title" class="form-control" placeholder="Title" >
                           </div>
                           <button type="submit" class="view-btn">Submit</button>
                        </div>
                        
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
<!-- Sticky Footer -->

@endsection
