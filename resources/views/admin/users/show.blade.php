@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <h2 class="card-header">Show User</h2>
    <a class="view-btn" href="{{ route('admin.users.index') }}">
        <i class="fa fa-arrow-left"></i> Back
    </a>

    <div class="showuser">
        <div class="row">

            @if (!empty($user->name))
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Name:</strong> {{ $user->name }}
                    </div>
                </div>
            @endif

            @if (!empty($user->email))
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Email:</strong> <span class="emailusername">{{ $user->email }}</span>
                    </div>
                </div>
            @endif

            @if (!empty($user->phone))
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Phone:</strong> {{ $user->phone }}
                    </div>
                </div>
            @endif

            @if (!empty($user->address))
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Address:</strong> {{ $user->address }}
                    </div>
                </div>
            @endif

            @if (!empty($user->getRoleNames()) && $user->getRoleNames()->isNotEmpty())
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Roles:</strong>
                        @foreach($user->getRoleNames() as $role)
                            <label class="badge bg-primary">{{ $role }}</label>
                        @endforeach
                    </div>
                </div>
            @endif

            @if (!empty($user->restaurant))
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Restaurant:</strong> {{ $user->restaurant->name }}
                    </div>
                </div>
            @endif

            @if (!empty($user->profile_image))
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Profile Image:</strong><br>
                        <a href="{{ Storage::url($user->profile_image) }}" data-fancybox="gallery" data-caption="Profile Image">
                            <img src="{{ Storage::url($user->profile_image) }}" alt="Profile Image" width="100" style="cursor:pointer;">
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
