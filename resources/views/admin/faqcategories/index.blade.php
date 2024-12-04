@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<div class="dashboard-panel">
<div class="role-management">
    <div class="content">
    <div class="pull-left"><h2>Faq Categories</h2></div>
               <div class="pull-right">
                  <a class="view-btn" href="{{ url('admin/faqcategories/create')}}">Add New Faq category</a>
               </div>
               <!-- /.card-header -->
               <div class="tablescroll-tableroll">
                  <table id="example2" class="management-table table table-bordered">
                     <thead>
                        <tr>
                           <th>Sr No</th>
                           <th>Faq Category</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(!empty($faqcategories))
                        @foreach($faqcategories as $key => $faq)
                        <tr>
                           <td>{{ $i + $loop->index + 1 }}</td>
                           <td>{{$faq->title}}</td>
                           <td>
                              <a class="btn btn-primary btn-sm" title="Edit" href="{{ route('admin.faqcategories.edit', base64_encode($faq->id)) }}"><i class="fa fa-edit " aria-hidden="true"></i></a>

                              <form method="POST" action="{{ route('admin.faqcategories.destroy', $faq->id) }}" style="display:inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm deletion?');"><i class="fa-solid fa-trash-can"></i></button>
                              </form>
                           </td>
                        </tr>
                        @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>
               {!! $faqcategories->links('pagination::bootstrap-5') !!}
            <!-- /.card -->
   <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
</div>
@endsection
