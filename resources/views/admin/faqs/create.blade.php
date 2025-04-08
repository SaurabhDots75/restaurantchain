@extends('admin.layouts.app')
@section('content')
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
   @if ($errors->has('status'))
   <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $errors->first('status') }}
   </div>
   @endif
   <div class="role-management">
   <div class="content">
      <div class="form-setting">
      <div class="pull-left">
                    <h2>Add Faq</h2>
       </div>
         <form id="cmsForm" action="{{ route('admin.faqs.store') }}" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="row">
               <div class="col-md-8">
                  <div class="card card-primary">
                     <div class="card-body">
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Question</label>
                              <input type="text" id="title" name="title" class="form-control" >
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Answer</label>
                              <textarea id="description" name="description" class="form-control ckeditor"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 mt">
                  <div class="card card-header">

						<div class="form-group">
						   <div class="form-label-group">
							  <label for="product_name">Categories</label>
								<select name="categories" id="categories" class="form-control" >
									@foreach($faqcategories as $cat)
										<option value = {{ $cat->id }} {{ old('cat') == $cat->id ? 'selected' : ''}} >{{ $cat->title }}</option>
									@endforeach
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
</div>
</div>
</div>
</div>
@endsection
