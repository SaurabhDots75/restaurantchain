@extends('admin.layouts.app')

@section('content')
<div class="container">
        @if ($errors->any())
         <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{$error}}
            @endforeach
         </div>
        @endif
    <h1>Create Attribute</h1>
    <form action="{{ route('admin.products.product-attributes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Attribute Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="variations" class="form-label">Variations</label>
            <div id="variations-container">
                <input type="text" name="variations[]" class="form-control mb-2" placeholder="Add a variation">
            </div>
            <button type="button" id="add-variation" class="btn btn-sm btn-secondary">Add Another Variation</button>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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