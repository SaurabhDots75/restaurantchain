@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2>Edit Restaurant</h2>
        </div>
    </div>

    @if (count($errors) > 0)
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
        <form method="POST" action="{{ route('admin.restaurants.update', $restaurant->id) }}">
            @csrf
            @method('PUT')

            <div class="edituserform-row">

                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" placeholder="Restaurant Name" class="form-control" 
                        value="{{ old('name', $restaurant->name) }}">
                </div>

                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" placeholder="Restaurant Address" class="form-control" 
                        value="{{ old('address', $restaurant->address) }}">
                </div>

                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" placeholder="Phone Number" class="form-control" 
                        value="{{ old('phone', $restaurant->phone) }}">
                </div>

                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" placeholder="Email" class="form-control" 
                        value="{{ old('email', $restaurant->email) }}">
                </div>
            </div>

            <div class="btnsubmit">
                <button type="submit" class="view-btn">Update</button>
                <a href="{{ route('admin.restaurants.index') }}" class="view-btn">Cancel</a>
            </div>

        </form>
    </div>
</div>
@endsection

