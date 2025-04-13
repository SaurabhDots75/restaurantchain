@extends('admin.layouts.app')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
   {{ Session::get('success') }}
   @php
   Session::forget('success');
   @endphp
</div>
@endif

<!-- Main content -->
<div class="dashboard-panel">
   <div class="role-management">
      <div class="content">
      
         <div class="card mb-4">
            <div class="card-header">
                <h4 class="mb-0">General Settings</h4>
            </div>
            <div class="card-body">
                <!-- Website URL Section -->
                <form method="POST" action="">
                   @csrf
                   @method('PUT')
                   <div class="mb-4">
                       <label for="website_url" class="form-label">Website URL</label>
                       <input type="url" class="form-control" name="website_url" id="website_url"
                              value="{{ $restaurant->website_url ?? '' }}" placeholder="https://example.com">
                   </div>
                   <button type="submit" class="btn btn-primary">Update Website URL</button>
                </form>
             </div>
         </div>

         <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Registration Number</h5>
            </div>
            <div class="card-body">
                <!-- Registration Number Section -->
                <form method="POST" action="">
                   @csrf
                   @method('PUT')
                   <div class="mb-4">
                       <label for="registration_number" class="form-label">Registration Number</label>
                       <input type="text" class="form-control" name="registration_number" id="registration_number"
                              value="{{ $restaurant->registration_number ?? '' }}">
                   </div>
                   <button type="submit" class="btn btn-primary">Update Registration Number</button>
                </form>
            </div>
         </div>

         <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Phone Number</h5>
            </div>
            <div class="card-body">
                <!-- Phone Section -->
                <form method="POST" action="">
                   @csrf
                   @method('PUT')
                   <div class="mb-4">
                       <label for="phone" class="form-label">Phone Number</label>
                       <input type="text" class="form-control" name="phone" id="phone"
                              value="{{ $restaurant->phone ?? '' }}">
                   </div>
                   <button type="submit" class="btn btn-primary">Update Phone</button>
                </form>
            </div>
         </div>

         <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Full Address</h5>
            </div>
            <div class="card-body">
                <!-- Address Section -->
                <form method="POST" action="">
                   @csrf
                   @method('PUT')
                   <div class="mb-4">
                       <label for="address" class="form-label">Full Address</label>
                       <textarea class="form-control" name="address" id="address" rows="3">{{ $restaurant->address ?? '' }}</textarea>
                   </div>
                   <button type="submit" class="btn btn-primary">Update Address</button>
                </form>
            </div>
         </div>

         <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Service Type Availability</h5>
            </div>
            <div class="card-body">
                <!-- Service Type Availability Section -->
                <form method="POST" action="">
                   @csrf
                   @method('PUT')
                   <div class="form-check">
                       <input class="form-check-input" type="checkbox" name="service_type[]" value="dine_in" id="dineIn"
                              {{ in_array('dine_in', $restaurant->service_type ?? []) ? 'checked' : '' }}>
                       <label class="form-check-label" for="dineIn">Dine In</label>
                   </div>
                   <div class="form-check">
                       <input class="form-check-input" type="checkbox" name="service_type[]" value="pickup" id="pickup"
                              {{ in_array('pickup', $restaurant->service_type ?? []) ? 'checked' : '' }}>
                       <label class="form-check-label" for="pickup">Pickup</label>
                   </div>
                   <div class="form-check">
                       <input class="form-check-input" type="checkbox" name="service_type[]" value="delivery" id="delivery"
                              {{ in_array('delivery', $restaurant->service_type ?? []) ? 'checked' : '' }}>
                       <label class="form-check-label" for="delivery">Delivery</label>
                   </div>
                   <button type="submit" class="btn btn-primary">Update Service Type</button>
                </form>
            </div>
         </div>

         <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Operating Hours</h5>
            </div>
            <div class="card-body">
                <!-- Operating Hours Section -->
                <form method="POST" action="">
                   @csrf
                   @method('PUT')
                   <div class="row">
                       <div class="col-md-6 mb-3">
                           <label for="opening_time" class="form-label">Opening Time</label>
                           <input type="time" class="form-control" id="opening_time" name="opening_time"
                                  value="{{ $restaurant->opening_time ?? '' }}">
                       </div>
                       <div class="col-md-6 mb-3">
                           <label for="closing_time" class="form-label">Closing Time</label>
                           <input type="time" class="form-control" id="closing_time" name="closing_time"
                                  value="{{ $restaurant->closing_time ?? '' }}">
                       </div>
                   </div>
                   <button type="submit" class="btn btn-primary">Update Operating Hours</button>
                </form>
            </div>
         </div>

      </div>
   </div>
</div>
<!-- /.content -->
@endsection
