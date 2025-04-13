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
        <form method="POST" action="{{ route('admin.restaurants.update', $restaurant->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div class="edituserform-row">
                
                <!-- Restaurant Name -->
                <div class="form-group">
                    <strong> Name:</strong>
                    <input type="text" name="name" placeholder="Restaurant Name" class="form-control" 
                        value="{{ old('name', $restaurant->name) }}">
                </div>
        
                <!-- Address -->
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" placeholder="Restaurant Address" class="form-control" 
                        value="{{ old('address', $restaurant->address) }}">
                </div>
        
                <!-- Phone -->
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" placeholder="Phone Number" class="form-control" 
                        value="{{ old('phone', $restaurant->phone) }}">
                </div>
        
                <!-- Email -->
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" placeholder="Email" class="form-control" 
                        value="{{ old('email', $restaurant->email) }}">
                </div>
        
                <!-- City -->
                <div class="form-group">
                    <strong>City:</strong>
                    <input type="text" name="city" placeholder="City" class="form-control" 
                        value="{{ old('city', $restaurant->city) }}">
                </div>
        
                <!-- State -->
                <div class="form-group">
                    <strong>State:</strong>
                    <input type="text" name="state" placeholder="State" class="form-control" 
                        value="{{ old('state', $restaurant->state) }}">
                </div>
        
                <!-- Country -->
                <div class="form-group">
                    <strong>Country:</strong>
                    <input type="text" name="country" placeholder="Country" class="form-control" 
                        value="{{ old('country', $restaurant->country) }}">
                </div>
        
                <!-- Zip Code -->
                <div class="form-group">
                    <strong>Zip Code:</strong>
                    <input type="text" name="zip_code" placeholder="Zip Code" class="form-control" 
                        value="{{ old('zip_code', $restaurant->zip_code) }}">
                </div>
                

                     <!-- Logo Upload -->
                     <div class="form-group">
                        <strong>Logo:</strong>
                        <input type="file" name="logo" class="form-control" accept="image/*">
                        @if($restaurant->logo)
                            <img src="{{ Storage::url($restaurant->logo) }}" alt="Logo" width="100" style="cursor:pointer;">
                        @endif
                    </div>
            
                    <!-- Cover Image Upload -->
                    <div class="form-group">
                        <strong>Cover Image:</strong>
                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                        @if($restaurant->cover_image)
                            <img src="{{ Storage::url($restaurant->cover_image) }}" alt="Cover Image" width="100" style="cursor:pointer;">
                        @endif
                    </div>
  
             

        
                <!-- Opening Time -->
                <div class="form-group">
                    <strong>Opening Time:</strong>
                    <input type="time" name="opening_time" class="form-control" 
                           value="{{ old('opening_time', \Carbon\Carbon::parse($restaurant->opening_time)->format('H:i') ?? '') }}">
                </div>
                
                <!-- Closing Time -->
                <div class="form-group">
                    <strong>Closing Time:</strong>
                    <input type="time" name="closing_time" class="form-control" 
                           value="{{ old('closing_time', \Carbon\Carbon::parse($restaurant->closing_time)->format('H:i') ?? '') }}">
                </div>
                
                <div class="form-group">
                    <strong>Registration Number:</strong>
                    <input type="text" name="registration_number" placeholder="Registration Number" class="form-control" 
                        value="{{ old('registration_number', $restaurant->registration_number) }}">
                </div>
        
                <!-- Website URL -->
                <div class="form-group">
                    <strong>Website URL:</strong>
                    <input type="url" name="website_url" placeholder="Website URL" class="form-control" 
                        value="{{ old('website_url', $restaurant->website_url) }}">
                </div>
        
                <!-- Delivery Enabled -->
                <div class="form-group">
                    <strong>Delivery Enabled:</strong>
                    <input type="checkbox" name="delivery_enabled" value="1" {{ old('delivery_enabled', $restaurant->delivery_enabled) ? 'checked' : '' }}>
                </div>
        
                <!-- Dine-In Enabled -->
                <div class="form-group">
                    <strong>Dine-In Enabled:</strong>
                    <input type="checkbox" name="dine_in_enabled" value="1" {{ old('dine_in_enabled', $restaurant->dine_in_enabled) ? 'checked' : '' }}>
                </div>
        
                <!-- Pickup Enabled -->
                <div class="form-group">
                    <strong>Pickup Enabled:</strong>
                    <input type="checkbox" name="pickup_enabled" value="1" {{ old('pickup_enabled', $restaurant->pickup_enabled) ? 'checked' : '' }}>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea name="description" class="form-control" rows="4" placeholder="Restaurant Description">{{ old('description', $restaurant->description) }}</textarea>
                </div>
           
            </div>
        
            <!-- Submit and Cancel Buttons -->
            <div class="btnsubmit">
                <button type="submit" class="view-btn">Update</button>
                <a href="{{ route('admin.restaurants.index') }}" class="view-btn">Cancel</a>
            </div>
        </form>
        
    </div>
</div>
@endsection

