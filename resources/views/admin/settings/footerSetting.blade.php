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
                <h2>Footer Settings</h2>
            </div>
      <div class="card-body">
      <div class="form-setting">
        <form action="{{ url('admin/settings-update') }}" enctype="multipart/form-data" method="post">
          @csrf
          <div class="row">
            <div class="col-md-7">
              <div class="card card-primary">
                    <h3 class="card-title">Section 1</h3>
                  <div class="card-body">
                    <!-- Color Picker -->
                    <div class="form-group">
                      <div class="form-label-group">
                      <label for="sec1-title">Section 1 Title</label>
                      <input type="text" id="sec1-title" name="footer_sec1-title" value="{{$settings->get_options('footer_sec1-title')}}" class="form-control" placeholder="Section 1 Title">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-label-group">
                      <label for="product_name">About</label>
                      <textarea id="about" name="about" class="form-control">{{$settings->get_options('about')}}</textarea>
                    </div>
                    </div>

                  </div>



                    <h3 class="card-title">Section 2</h3>
                  <div class="card-body">
                    <!-- Color Picker -->
                    <div class="form-group">
                    <div class="form-label-group">
                      <label for="footer_sec2-title">Section 2 Title</label>
                      <input type="text" id="footer_sec2-title" name="footer_sec2-title" value="{{$settings->get_options('footer_sec2-title')}}" class="form-control" placeholder="Section 2 Title">
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="form-label-group">
                      <label for="product_name">Catalogue</label>
                      <textarea id="catalogue" name="catalogue" class="form-control">{{$settings->get_options('catalogue')}}</textarea>
                    </div>
                    </div>
                  </div>



                    <h3 class="card-title">Section 3</h3>
                  <div class="card-body">
                    <!-- Color Picker -->
                    <div class="form-group">
                    <div class="form-label-group">
                      <label for="footer_sec3-title">Section 3 Title</label>
                      <input type="text" id="footer_sec3-title" name="footer_sec3-title" value="{{$settings->get_options('footer_sec3-title')}}" class="form-control" placeholder="Section 3 Title">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-label-group">
                      <label for="resources">Resources</label>
                      <textarea id="resources" name="resources" class="form-control">{{$settings->get_options('resources')}}</textarea>
                    </div>
                    </div>

                  </div>


                    <h3 class="card-title">Section 4</h3>

                  <div class="card-body">
                    <!-- Color Picker -->
                    <div class="form-group">
                    <div class="form-label-group">
                      <label for="footer_sec4-title">Section 4 Title</label>
                      <input type="text" id="footer_sec4-title" name="footer_sec4-title" value="{{$settings->get_options('footer_sec4-title')}}" class="form-control" placeholder="Section 4 Title">
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="form-label-group">
                      <label for="product_name">Resources</label>
                      <textarea id="sec-resources" name="sec-resources" class="form-control">{{$settings->get_options('sec-resources')}}</textarea>
                    </div>
                    </div>

                  </div>

                        <h3 class="card-title">Section 5</h3>
                    <div class="card-body">
                      <!-- Color Picker -->
                      <div class="form-group">
                      <div class="form-label-group">
                        <label for="footer_sec5-title">Section 5 Title</label>
                        <input type="text" id="footer_sec5-title" name="footer_sec5-title" value="{{$settings->get_options('footer_sec5-title')}}" class="form-control" placeholder="Section 5 Title">
                      </div>
                      </div>

                      <div class="form-group">
                      <div class="form-label-group">
                        <label for="product_name">Policies</label>
                        <textarea id="policies" name="policies" class="form-control">{{$settings->get_options('policies')}}</textarea>
                      </div>
                      </div>
                    </div>

              </div>
            </div>
            <div class="col-md-5">
              <div class="card card-header">
                    <h3 class="card-title">Footer Bottom</h3>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="product_name">Footer Left</label>
                    <textarea id="footer-left" name="footer-left" class="form-control">{{$settings->get_options('footer-left')}}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="product_name">Footer Center</label>
                    <textarea id="footer-center" name="footer-center" class="form-control">{{$settings->get_options('footer-center')}}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="product_name">Footer Right</label>
                    <textarea id="footer-right" name="footer-right" class="form-control">{{$settings->get_options('footer-right')}}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="view-btn"">Submit</button>
                  <a href="{{ route('admin.home') }}" class="view-btn"> Cancel</a>
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
@endsection