@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h3 class="text-gray-800 text-2xl sm:text-3xl font-semibold">
            Create Email Template
        </h3>
        <a href="{{ route('admin.email-templates.index') }}" 
           class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md transition">
            Back to List
        </a>
    </div>

    <div class="mt-10 bg-white p-6 rounded-lg shadow">
        <form action="{{ route('admin.email-templates.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Template Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Template Name</label>
                <input type="text" name="name" id="name" 
                       value="{{ old('name') }}" 
                       class="mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email Subject --}}
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700">Email Subject</label>
                <input type="text" name="subject" id="subject" 
                       value="{{ old('subject') }}" 
                       class="mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500">
                @error('subject')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email Content --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Email Content</label>
                <textarea name="content" id="content" rows="10"
                          class="ckeditor mt-1 w-full rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500">
                    {{ old('content') }}
                </textarea>
                <p class="text-sm text-gray-500 mt-2">Use variables in curly braces e.g., <code>{name}</code></p>
                @error('content')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Variables --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Available Variables</label>
                <div id="variable-fields" class="mt-2 space-y-2">
                    <div class="flex gap-2">
                        <input type="text" name="variables[]" placeholder="Variable name"
                               class="flex-1 rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500">
                        <button type="button" onclick="addVariableField(this)"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md transition">+</button>
                    </div>
                </div>
                @error('variables')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="pt-4 flex justify-end">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium transition">
                    Create Template
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Initialize CKEditor
    CKEDITOR.replace('content', {
        height: 300,
        toolbar: [
            ['Source'],
            ['Bold', 'Italic', 'Underline', 'Strike'],
            ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['Link', 'Unlink'],
            ['Format', 'Font', 'FontSize'],
            ['TextColor', 'BGColor'],
            ['Table', 'HorizontalRule', 'SpecialChar']
        ],
        removePlugins: 'elementspath,resize',
        allowedContent: true,
        entities: false,
        basicEntities: false
    });

    // Add new variable input field
    function addVariableField(button) {
        const container = button.closest('.flex');
        const newField = container.cloneNode(true);
        newField.querySelector('input').value = '';
        container.parentNode.appendChild(newField);
    }

    // Remove variable input field
    function removeVariableField(button) {
        const field = button.closest('.flex');
        if (field.parentNode.children.length > 1) {
            field.remove();
        }
    }
</script>
@endpush
@endsection