@extends('admin.layouts.app')
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Edit Food Item</h2>
            <a href="{{ route('admin.menu-items.index') }}" class="text-indigo-600 hover:text-indigo-800">Back to List</a>
        </div>

        @include('admin.menu-items.form', ['menuItem' => $menuItem])
    </div>
</div>
@endsection