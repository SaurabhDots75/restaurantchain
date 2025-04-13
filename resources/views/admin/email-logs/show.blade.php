@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h3 class="text-gray-800 text-2xl sm:text-3xl font-semibold">
            Email Log Details
        </h3>
        <a href="{{ route('admin.email-logs.index') }}" 
           class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md transition">
            Back to List
        </a>
    </div>

    <div class="mt-8 bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 space-y-6">
            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-lg font-medium text-gray-900">Basic Information</h4>
                    <dl class="mt-4 space-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Template Name</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $emailLog->emailTemplate?->name ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Recipient Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $emailLog->recipient_email }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Subject</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $emailLog->subject }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $emailLog->status === 'sent' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $emailLog->status === 'failed' ? 'bg-red-100 text-red-800' : '' }}
                                    {{ $emailLog->status === 'delivered' ? 'bg-blue-100 text-blue-800' : '' }}">
                                    {{ ucfirst($emailLog->status) }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Sent At</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $emailLog->sent_at->format('Y-m-d H:i:s') }}</dd>
                        </div>
                    </dl>
                </div>

                @if($emailLog->error_message)
                <div>
                    <h4 class="text-lg font-medium text-gray-900">Error Information</h4>
                    <div class="mt-4 p-4 bg-red-50 rounded-md">
                        <pre class="text-sm text-red-700 whitespace-pre-wrap">{{ $emailLog->error_message }}</pre>
                    </div>
                </div>
                @endif
            </div>

            <!-- Email Content -->
            <div class="mt-8">
                <h4 class="text-lg font-medium text-gray-900">Email Content</h4>
                <div class="mt-4 p-4 bg-gray-50 rounded-md">
                    <div class="prose max-w-none">
                        {!! $emailLog->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection