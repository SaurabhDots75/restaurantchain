@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h3 class="text-gray-700 text-3xl font-medium">Email Template Details</h3>
        <div class="space-x-4">
            <a href="{{ route('admin.email-templates.edit', $emailTemplate->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit Template</a>
            <a href="{{ route('admin.email-templates.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to List</a>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h4 class="text-lg font-medium text-gray-900">Basic Information</h4>
                    <div class="mt-4 space-y-4">
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
                        <div>
                            <p class="text-sm font-medium text-gray-500">Created At</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $emailTemplate->created_at->format('M d, Y H:i A') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Last Updated</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $emailTemplate->updated_at->format('M d, Y H:i A') }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-medium text-gray-900">Template Content</h4>
                    <div class="mt-4 space-y-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Subject</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $emailTemplate->subject }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Content</p>
                            <div class="mt-1 prose max-w-none bg-gray-50 p-4 rounded-lg">
                                {!! nl2br(e($emailTemplate->content)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($emailTemplate->variables)
        <div class="p-6">
            <h4 class="text-lg font-medium text-gray-900">Template Variables</h4>
            <div class="mt-4 grid grid-cols-3 gap-4">
                @foreach($emailTemplate->variables as $variable)
                <div class="bg-gray-50 p-3 rounded-lg">
                    <p class="text-sm font-medium text-gray-900">{{{ $variable }}}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="p-6 bg-gray-50 border-t">
            <div class="flex justify-between items-center">
                <div class="flex space-x-4">
                    <a href="{{ route('admin.email-templates.preview', $emailTemplate->id) }}" 
                       class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Preview Template</a>
                    <form action="{{ route('admin.email-templates.toggle-status', $emailTemplate->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">
                            {{ $emailTemplate->is_active ? 'Deactivate' : 'Activate' }} Template
                        </button>
                    </form>
                </div>
                <form action="{{ route('admin.email-templates.destroy', $emailTemplate->id) }}" method="POST" 
                      class="inline" onsubmit="return confirm('Are you sure you want to delete this template?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete Template</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection