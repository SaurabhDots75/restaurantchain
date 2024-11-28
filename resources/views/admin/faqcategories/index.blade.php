@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                 <div class="text-right">
                  <a href="{{ url('admin/faqcategories/create')}}"><button type="button" class="btn btn-primary add-button">Add New Faq category</button></a>
               </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>Faq Category</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(!empty($faqcategories))
                        @php ($i = 1)
                        @foreach($faqcategories as $faq)
                        <tr>
                           <td>{{$faq->title}}</td>
                           <td>
                              <a title="Edit" href="{{ route('admin.faqcategories.edit', base64_encode($faq->id)) }}"><i class="fa fa-edit " aria-hidden="true"></i></a>

                              <form method="POST" action="{{ route('admin.faqcategories.destroy', $faq->id) }}" style="display:inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm deletion?');"><i class="fa-solid fa-trash-can"></i></button>
                              </form>
                           </td>
                        </tr>
                        @php ($i++)
                        @endforeach
                        @endif
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>Faq Category</th>
                           <th>Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
