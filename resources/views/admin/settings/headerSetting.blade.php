@extends('admin.layouts.app')

@section('content')
@inject('settings', 'App\Models\Setting')
<div class="dashboard-panel">
<div class="role-management">
<div id="content-wrapper">
   <div class="container-fluid">
      @if(session()->has('alert-danger'))
      <div class="alert alert-danger">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('alert-danger') }}
      </div>
      @endif
      @if(session()->has('alert-success'))
      <div class="alert alert-success">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('alert-success') }}
      </div>
      @endif
      <!-- DataTables Example -->
      <div class="pull-left">
                    <h2>Settings</h2>
       </div>
         <div class="card-body">
            <div class="form-setting">
            <form action="{{ url('admin/settings-update') }}" enctype="multipart/form-data" method="post">
               @csrf
               <div class="row">
                  <div class="col-md-6">
                     <div class="card card-primary">
                        <div class="card-body">
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="product_name">Top Bar Desktop</label>
                                 <textarea id="top-bar-desktop" name="top-bar-desktop" class="form-control">{{$settings->get_options('top-bar-desktop')}}</textarea>
                              </div>
                           </div>
                           <div class="form-group">
                           <div class="form-label-group">
                              <label for="discount-text-header">Discount Text Header</label>
                             <textarea id="discount-text-header" name="discount-text-header" class="form-control">{{$settings->get_options('discount-text-header')}}</textarea> 
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="discount-date">Discount Date</label>
                             <textarea id="discount-date" name="discount-date" class="form-control">{{$settings->get_options('discount-date')}}</textarea> 
                           </div>
                        </div>
                        
                                 <h3 class="card-title">Top Bar Mobile</h3>
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="product_name">Field 1</label>
                                 <input type="text" id="field1" name="field1" value="{{$settings->get_options('field1')}}" class="form-control" placeholder="Field 1">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="product_name">Field 2</label>
                                 <input type="text" id="field2" name="field2" value="{{$settings->get_options('field2')}}" class="form-control" placeholder="Field 2">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="product_name">Field 3</label>
                                 <input type="text" id="field3" name="field3" value="{{$settings->get_options('field3')}}" class="form-control" placeholder="Field 3">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="product_name">Field 4</label>
                                 <input type="text" id="field4" name="field4" value="{{$settings->get_options('field4')}}" class="form-control" placeholder="Field 4">
                              </div>
                           </div>
                        </div>
                        <div class="card-body">
                                 <h3 class="card-title">Header Bottom</h3>
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="product_name">Left</label>
                                 <textarea id="header-left" name="header-left" class="form-control">{{$settings->get_options('header-left')}}</textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="product_name">Center</label>
                                 <textarea id="header-center" name="header-center" class="form-control">{{$settings->get_options('header-center')}}</textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="product_name">Right</label>
                                 <textarea id="header-right" name="header-right" class="form-control">{{$settings->get_options('header-right')}}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="form-group">
                              <div class="form-label-group">
                                 <label for="product_name">Other Scripts</label>
                                 <textarea id="other" name="other" class="form-control">{{$settings->get_options('other')}}</textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card card-header">
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Location</label>
                              <textarea id="location1" name="location1" class="form-control">{{$settings->get_options('location1')}}</textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Location 2</label>
                              <textarea id="location2" name="location2" class="form-control">{{$settings->get_options('location2')}}</textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-label-group">
                              <label for="product_name">Whatsapp No.</label>
                              <input type="text" id="whatsapp" name="whatsapp" value="{{$settings->get_options('whatsapp')}}" class="form-control" placeholder="Whatsapp No.">
                           </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="view-btn">Submit</button>
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
</div>
<!-- Sticky Footer -->
<script>
   $(function() {
      // Summernote
      $('#copyright').summernote()

   })
</script>
@endsection