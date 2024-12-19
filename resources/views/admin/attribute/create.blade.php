@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="dashboard-panel">
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
                    <h2>Create Attribute</h2>
                </div>
                <div class="form-setting">
                    <form id="addForm" action="{{ route('admin.products.product-attributes.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label for="name" class="form-label">Attribute Name</label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                            <div class="form-label-group">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" id="description" class="form-control"></textarea>
                                            </div>
                                            <div class="form-label-group">
                                                <label for="variations" class="form-label">Variations</label>
                                                <div id="variations-container">
                                                    <input type="text" name="variations[]" class="form-control mb-2" placeholder="Add a variation">
                                                </div>
                                                <button type="button" id="add-variation" class="btn btn-sm btn-secondary">Add Another Variation</button>
                                            </div>
                                            <button type="submit" class="view-btn">Submit</button>
                                            <a href="{{ route('admin.faqcategories.index') }}" class="view-btn"> Cancel</a>
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

@endsection
@section('custom_js_scripts')
<script>
    document.getElementById('add-variation').addEventListener('click', function() {
        const container = document.getElementById('variations-container');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'variations[]';
        input.className = 'form-control mb-2';
        input.placeholder = 'Add a variation';
        container.appendChild(input);
    });
</script>
@endsection