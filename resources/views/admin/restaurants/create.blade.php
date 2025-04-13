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
            <form method="POST" action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="edituserform-row">
                    <div class="form-group">
                        <strong> Name:</strong>
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

                    <div class="form-group">
                        <strong>City:</strong>
                        <input type="text" name="city" placeholder="City" class="form-control"
                            value="{{ old('city') }}">
                    </div>

                    <div class="form-group">
                        <strong>State:</strong>
                        <input type="text" name="state" placeholder="State" class="form-control"
                            value="{{ old('state') }}">
                    </div>

                    <div class="form-group">
                        <strong>Country:</strong>
                        <input type="text" name="country" placeholder="Country" class="form-control"
                            value="{{ old('country') }}">
                    </div>

                    <div class="form-group">
                        <strong>Zip Code:</strong>
                        <input type="text" name="zip_code" placeholder="Zip Code" class="form-control"
                            value="{{ old('zip_code') }}">
                    </div>

                    <div class="form-group">
                        <strong>Logo:</strong>
                        <input type="file" name="logo" class="form-control" accept="image/*">
                    </div>

                    <div class="form-group">
                        <strong>Cover Image:</strong>
                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                    </div>


                
                    <div class="form-group">
                        <strong>Opening Time:</strong>
                        <input type="time" name="opening_time" class="form-control" value="{{ old('opening_time') }}">
                    </div>

                    <div class="form-group">
                        <strong>Closing Time:</strong>
                        <input type="time" name="closing_time" class="form-control" value="{{ old('closing_time') }}">
                    </div>


                    <div class="form-group">
                        <strong>Registration Number:</strong>
                        <input type="text" name="registration_number" placeholder="Registration Number"
                            class="form-control" value="{{ old('registration_number') }}">
                    </div>
                    <div class="form-group">
                        <strong>Website URL:</strong>
                        <input type="url" name="website_url" placeholder="Website URL" class="form-control"
                            value="{{ old('website_url') }}">
                    </div>

                    
                 
                    <div class="form-group">
                        <strong>Delivery Enabled:</strong>
                        <input type="checkbox" value="1" name="delivery_enabled"
                            {{ old('delivery_enabled') ? 'checked' : '' }}> Yes
                    </div>

                    <div class="form-group">
                        <strong>Dine-In Enabled:</strong>
                        <input type="checkbox" value="1" name="dine_in_enabled"
                            {{ old('dine_in_enabled') ? 'checked' : '' }}> Yes
                    </div>

                    <div class="form-group">
                        <strong>Pickup Enabled:</strong>
                        <input type="checkbox" value="1" name="pickup_enabled"
                            {{ old('pickup_enabled') ? 'checked' : '' }}> Yes
                    </div>
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea name="description" placeholder="Restaurant Description" class="form-control">{{ old('description') }}</textarea>
                    </div>
                </div>

                <button type="submit" class="view-btn">Submit</button>
                <a href="{{ route('admin.restaurants.index') }}" class="view-btn">Cancel</a>
            </form>

        </div>
    </div>
@endsection
