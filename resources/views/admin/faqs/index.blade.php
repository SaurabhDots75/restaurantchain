@extends('admin.layouts.app')
@section('content')
<section class="content search-container  {{ request()->search_open == 'open' ? '' : 'd-none' }}">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Search here</h3>
                    </div>
                    <form method="GET">
                        <input name="search_open" type="hidden" class="form-control" id="search_open" value="open">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input name="title" type="text" class="form-control" id="title" value="{{ request()->title }}" placeholder="Search by Question">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">Search</button>
                            <a href="{{ url('admin/faqs') }}" class="btn btn-primary">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="text-right">
                            <a href="{{ url('admin/faqs/create') }}" class="btn btn-primary">Add New Faq</a>
                            <a href="javascript:;"><button type="button" class="btn btn-primary search-button"><i class="fa fa-search"></i></button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                <tr class="{{$faq->is_deleted ? 'bg-danger' : '' }}">
                                    <td>{{ isset($faq->category_name)?$faq->category_name:'No Category' }}</td>
                                    <td>{{ $faq->title }}</td>
                                    <td><?php echo html_entity_decode($faq->description); ?></td>
                                    <td>{{ $faq->created_at }}</td>
                                    <td>
                                        <a title="Edit" href="{{ route('admin.faqs.edit', base64_encode($faq->id)) }}"><i class="fa fa-edit " aria-hidden="true"></i></a>


                                       
                                        <form method="POST" action="{{ route('admin.faqs.destroy', $faq->id) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm deletion?');"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="pagination-container float-right">
                            {{ $faqs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection