@extends('admin.layouts.app')

@section('content')
<div class="content">
   <!-- Breadcrumbs-->
   <!-- DataTables Example -->
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
                <div class="container-fluid">
                <div class="pull-left">
                        <h2>Edit Attribute</h2>
                </div>
                <div class="form-setting">

                <form id="cmsForm" action="{{ route('admin.products.product-attributes.update', $attribute->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label for="name" class="form-label">Attribute Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $attribute->name }}" required>
                                    </div>
                                    <div class="form-label-group">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" id="description" class="form-control">{{ $attribute->description }}</textarea>
                                    </div>
                                    <div class="form-label-group">
                                        <label for="variations" class="form-label">Variations</label>
                                            <div id="variations-container">
                                                @foreach ($attribute->variations as $variation)
                                                    <div class="variation-item mb-2" data-id="{{ $variation->id }}">
                                                            <input type="text" name="variations[{{ $variation->id }}][value]" class="form-control d-inline-block w-75" value="{{ $variation->value }}">
                                                            <input type="hidden" name="variations[{{ $variation->id }}][id]" value="{{ $variation->id }}">
                                                            <button type="button" class="btn btn-danger btn-sm remove-variation">Remove</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button type="button" id="add-variation" class="btn btn-sm btn-secondary">Add Another Variation</button>
                                    </div>
                                <button class="view-btn" type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.faqcategories.index') }}" class="view-btn"> Cancel</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </form>
</div>


@endsection
@section('custom_js_scripts')
<script>
    document.getElementById('add-variation').addEventListener('click', function() {
        const container = document.getElementById('variations-container');
        const wrapper = document.createElement('div');
        wrapper.className = 'variation-item mb-2';
        wrapper.innerHTML = `
            <input type="text" name="variations[][value]" class="form-control d-inline-block w-75" placeholder="New variation">
            <button type="button" class="btn btn-danger btn-sm remove-variation">Remove</button>
        `;
        container.appendChild(wrapper);
    });

    document.getElementById('variations-container').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-variation')) {
            const variationItem = event.target.closest('.variation-item');
            variationItem.remove(); // Remove the variation field from the DOM
        }
    });
</script>
@endsection