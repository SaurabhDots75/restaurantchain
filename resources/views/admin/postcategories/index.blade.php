@extends('admin.layouts.app')

@section('content')
      @if(Session::has('success'))
         <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                  Session::forget('success');
            @endphp
         </div>
      @endif
      
<!-- Main content -->
<div class="dashboard-panel">
<div class="role-management">
<div class="content">
<div class="pull-left"><h2>Posts Categories</h2></div>
                        <div class="pull-right">
                           <a class="view-btn" href="{{asset('admin/posts-categories/create')}}">Add Category </a>
                       </div>
                  
                <!-- /.card-header -->
               <div class="tablescroll-tableroll">
                  <table id="example2" class="management-table table table-bordered">
                     <thead>
                        <tr>
                           <th scope="col">Sr No</th>
                           <th scope="col">Name</th>
                           <th scope="col">Slug</th>
                           <th scope="col">Parent</th>
                           <th scope="col">Description</th>
                           <th scope="col">Created</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($getData as $key => $value)
                           <tr>
                              <td>{{++$key}}</td>
                              <td>{{$value->name}}</td>
                              <td>{{$value->slug}}</td>
                              <td>Parent</td>
                              <td>{!!$value->description!!}</td>
                              <td>{{$value->created_at->format('d-M-Y h:i:s')}}</td>
                              <td>
                                 @if($value->status == 1)
                                    <a class="btn btn-info btn-sm" title="Change Status"
                                    href="javascript:void(0);" class="statusSwitch" data-record="{{$value->id}}" data-value="0"><i
                                       class="fa fa-check" aria-hidden="true"></i></a>
                                 @else
                                    <a title="Change Status"
                                    href="javascript:void(0);" class="statusSwitch" data-record="{{$value->id}}" data-value="1"><i
                                       class="fa fa-times" aria-hidden="true"></i></a>
                                 @endif
                                 <a title="Edit" href="{{asset('admin/posts-categories/create/'.$value->slug)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit " aria-hidden="true"></i></a>
                                 <a title="Delete" href="javascript:void(0);" class="delete-modal btn btn-danger btn-sm" data-value="{{$value}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <!-- /.card-body -->
            <!-- /.card -->
            <!-- /.card -->
      <!-- /.row -->
</div>
<!-- /.content -->

<!-- Button trigger modal -->

<div id="myModal" class="modal fade" role="dialod">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">
            </h4>
            <button class="close" type="button" data-bs-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <div class="deleteContent">
               Are you sure want to delete <span class="title"></span>?
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
               <span id="footer_action_button"></span>
            </button>
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
               <span class="glyphicon glyphicon"></span> Close
            </button>
            <input type="hidden" name="themeId" value="" />
         </div>
      </div>
   </div>
</div>
</div>
</div>
@endsection