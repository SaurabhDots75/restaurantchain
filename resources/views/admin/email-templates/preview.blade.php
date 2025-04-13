@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h3 class="text-gray-700 text-3xl font-medium">Preview Email Template</h3>
        <div class="space-x-4">
            <a href="{{ route('admin.email-templates.edit', $emailTemplate->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit Template</a>
            <a href="{{ route('admin.email-templates.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to List</a>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b">
            <h4 class="text-lg font-medium text-gray-900">Template Details</h4>
            <div class="mt-4 grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Template Name</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $emailTemplate->name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Status</p>
                    <p class="mt-1">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $emailTemplate->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $emailTemplate->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <div class="p-6 border-b">
            <h4 class="text-lg font-medium text-gray-900">Email Preview</h4>
            <div class="mt-4 border rounded-lg p-6">
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-500">Subject</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $emailTemplate->subject }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Content</p>
                    <div class="mt-1 prose max-w-none">
                        {!! nl2br(e($emailTemplate->content)) !!}
                    </div>
                </div>
            </div>
        </div>

        @if($emailTemplate->variables)
        <div class="p-6">
            <h4 class="text-lg font-medium text-gray-900">Available Variables</h4>
            <div class="mt-4 grid grid-cols-2 gap-4">
                @foreach($emailTemplate->variables as $variable)
                <div class="bg-gray-50 rounded p-3">
                    <code class="text-sm">{{{ $variable }}}</code>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection