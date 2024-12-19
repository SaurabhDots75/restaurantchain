@extends('admin.layouts.app')
@section('content')

<?php
$selectedCategoryId = isset($getData->parent_id) ? $getData->parent_id : 'null';
?>
<div class="content">
   <!-- DataTables Example -->
   <div class="dashboard-panel">
      @if (\Session::has('success'))
         <div class="alert alert-success">
            <ul>
               <li>{!! \Session::get('success') !!}</li>
            </ul>
         </div>
      @endif
      @if ($errors->any())
         <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{$error}}
            @endforeach
         </div>
      @endif
      <div class="role-management">
         <div class="content">
            <div class="pull-left">
               <h2>Add Category</h2>
            </div>
            <div class="form-setting">
               <form id="addForm" action="{{ asset('admin/products/categories/add') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <input type="hidden" name="table_id" id="table_id" value="{{isset($getData->id)?$getData->id:''}}">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="card card-primary">
                           <div class="card-body">
                              <div class="form-group">
                                 <div class="form-label-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{isset($getData->title)?$getData->title:''}}">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="form-label-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug" value="{{isset($getData->slug)?$getData->slug:''}}">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="form-label-group">
                                    <label for="parent_id">Category</label>
                                    <select id="parent_id" name="parent_id" class="form-control">
                                       <option value="">Select a Category</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="form-label-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea id="short_description" name="short_description" class="form-control ckeditor">{{isset($getData->short_description)?$getData->short_description:''}}</textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="form-label-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control ckeditor">{{isset($getData->description)?$getData->description:''}}</textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card card-header">
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="meta_title">Meta Title</label>
                                 <input type="text" id="meta_title" name="meta_title" class="form-control" placeholder="Meta Title" value="{{isset($getData->meta_title)?$getData->meta_title:''}}">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="meta_keyword">Meta Keywords</label>
                                 <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" placeholder="Meta Keywords" value="{{isset($getData->meta_keyword)?$getData->meta_keyword:''}}">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="meta_description">Meta Description</label>
                                 <textarea id="meta_description" name="meta_description" class="form-control ckeditor" placeholder="Meta Description">{{isset($getData->meta_description)?$getData->meta_description:''}}</textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary">Submit</button>
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
@section('custom_js_scripts')
<script>
   $(document).ready(function() {
      const selectedCategoryId = '{{ $selectedCategoryId ?? "null" }}'; // Selected category ID from the backend
      // Fetch and populate categories on page load
      fetchCategories();

      function fetchCategories() {
         $.ajax({
            url: '/admin/categories/hierarchy',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
               const dropdown = $('#parent_id');
               dropdown.empty(); // Clear existing options
               dropdown.append('<option value="">Select a Category</option>'); // Default option
               appendOptions(dropdown, response, 0);
            },
            error: function() {
               alert('Failed to load categories. Please try again.');
            }
         });
      }

      function appendOptions(dropdown, categories, level) {
         categories.forEach(category => {
            // Prefix for child categories
            const prefix = '-'.repeat(level * 2);
            const isSelected = category.id == selectedCategoryId; // Check if the category is selected
            dropdown.append(
               $('<option></option>')
               .val(category.id)
               .text(prefix + category.title)
               .prop('selected', isSelected)
            );
            // Recursively handle child categories
            if (category.children && category.children.length > 0) {
               appendOptions(dropdown, category.children, level + 1);
            }
         });
      }
   });
</script>
@endsection