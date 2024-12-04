@extends('admin.layouts.app')
@section('content')


<div class="dashboard-panel">
    <div class="role-management">
        <div class="content">
            <div class="pull-left">
                <h2>Faqs</h2>
            </div>
            <div class="pull-right">
                <a class="view-btn" href="{{ url('admin/faqs/create') }}" class="btn btn-primary">Add New Faq</a>
            </div>

            <div class="tablescroll-tableroll">
                <table class="management-table table table-bordered">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Category Name</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $key => $faq)
                        <tr class="{{$faq->is_deleted ? 'bg-danger' : '' }}">
                            <td>{{ $i + $loop->index + 1 }}</td>
                            <td>{{ isset($faq->category_name)?$faq->category_name:'No Category' }}</td>
                            <td>{{ $faq->title }}</td>
                            <td>
                                <?php echo html_entity_decode($faq->description); ?>
                            </td>
                            <td>{{ $faq->created_at->format('d-M-Y h:i:s')}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" title="Edit"
                                    href="{{ route('admin.faqs.edit', base64_encode($faq->id)) }}"><i
                                        class="fa fa-edit " aria-hidden="true"></i></a>



                                <form method="POST" action="{{ route('admin.faqs.destroy', $faq->id) }}"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Confirm deletion?');"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-container float-right">
                    {!! $faqs->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection