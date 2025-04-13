@extends('admin.layouts.app')

@section('content')
    <div class="dashboard-panel">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New Restaurant</h2>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="edituserform">
            <form method="POST" action="{{ route('admin.restaurants.store') }}">
                @csrf

                <div class="edituserform-row">
                    <div class="form-group">
                        <strong>Restaurant Name:</strong>
                        <input type="text" name="name" placeholder="Restaurant Name" class="form-control"
                            value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <strong>Address:</strong>
                        <input type="text" name="address" placeholder="Restaurant Address" class="form-control"
                            value="{{ old('address') }}">
                    </div>

                    <div class="form-group">
                        <strong>Phone:</strong>
                        <input type="text" name="phone" placeholder="Phone Number" class="form-control"
                            value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" placeholder="Email" class="form-control"
                            value="{{ old('email') }}">
                    </div>
                </div>

                <button type="submit" class="view-btn">Submit</button>
                <a href="{{ route('admin.restaurants.index') }}" class="view-btn">Cancel</a>
            </form>
        </div>
    </div>
@endsection
