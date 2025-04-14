@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($emailTemplate) ? 'Edit Email Template' : 'Create Email Template' }}</h3>
        <a href="{{ route('admin.email-templates.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
            Back to List
        </a>
    </div>

    <div class="mt-8">
        <form action="{{ isset($emailTemplate) ? route('admin.email-templates.update', $emailTemplate->id) : route('admin.email-templates.store') }}" 
              method="POST" class="space-y-6">
            @csrf
            @if(isset($emailTemplate))
                @method('PUT')
            @endif

            <div>
                <label for="name" class="text-sm font-medium text-gray-700">Template Name</label>
                <input type="text" name="name" id="name" 
                       value="{{ old('name', isset($emailTemplate) ? $emailTemplate->name : '') }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subject" class="text-sm font-medium text-gray-700">Email Subject</label>
                <input type="text" name="subject" id="subject" 
                       value="{{ old('subject', isset($emailTemplate) ? $emailTemplate->subject : '') }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('subject')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="text-sm font-medium text-gray-700">Email Content</label>
                <textarea name="content" id="content" rows="10" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('content', isset($emailTemplate) ? $emailTemplate->content : '') }}</textarea>
                <p class="mt-2 text-sm text-gray-500">You can use variables in your content by wrapping them in curly braces, e.g. {name}</p>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="variables" class="text-sm font-medium text-gray-700">Available Variables</label>
                <div class="mt-2 space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="text" name="variables[]" placeholder="Variable name" 
                               class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <button type="button" onclick="addVariableField(this)" 
                                class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">+</button>
                    </div>
                    @if(isset($emailTemplate) && $emailTemplate->variables)
                        @foreach($emailTemplate->variables as $variable)
                            <div class="flex items-center space-x-2">
                                <input type="text" name="variables[]" value="{{ $variable }}" 
                                       class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <button type="button" onclick="removeVariableField(this)" 
                                        class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">-</button>
                            </div>
                        @endforeach
                    @endif
                </div>
                @error('variables')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    {{ isset($emailTemplate) ? 'Update Template' : 'Create Template' }}
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function addVariableField(button) {
        const container = button.closest('div');
        const newField = container.cloneNode(true);
        newField.querySelector('input').value = '';
        container.parentNode.appendChild(newField);
    }

    function removeVariableField(button) {
        const field = button.closest('div');
        if (field.parentNode.children.length > 1) {
            field.remove();
        }
    }
</script>
@endpush
@endsection