@extends('admin.layouts.app')

@section('content')
<div class="dashboard-panel">
    <h2 class="card-header">Show Restaurant</h2>
    <a class="view-btn" href="{{ route('admin.restaurants.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    <div class="showuser">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $restaurant->name ?? 'N/A' }} <!-- Check if name is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Email:</strong>
                    <span class="emailusername">{{ $restaurant->email ?? 'N/A' }}</span> <!-- Check if email is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Address:</strong>
                    {{ $restaurant->address ?? 'N/A' }} <!-- Check if address is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Phone:</strong>
                    {{ $restaurant->phone ?? 'N/A' }} <!-- Check if phone number is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>City:</strong>
                    {{ $restaurant->city ?? 'N/A' }} <!-- Check if city is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>State:</strong>
                    {{ $restaurant->state ?? 'N/A' }} <!-- Check if state is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Country:</strong>
                    {{ $restaurant->country ?? 'N/A' }} <!-- Check if country is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Zip Code:</strong>
                    {{ $restaurant->zip_code ?? 'N/A' }} <!-- Check if zip code is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $restaurant->description ?? 'N/A' }} <!-- Check if description is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Opening Time:</strong>
                    {{ $restaurant->opening_time ?? 'N/A' }} <!-- Check if opening time is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Closing Time:</strong>
                    {{ $restaurant->closing_time ?? 'N/A' }} <!-- Check if closing time is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Registration Number:</strong>
                    {{ $restaurant->registration_number ?? 'N/A' }} <!-- Check if registration number is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Website URL:</strong>
                    <a href="{{ $restaurant->website_url ?? '#' }}" target="_blank">{{ $restaurant->website_url ?? 'N/A' }}</a> <!-- Check if website URL is available -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Delivery Enabled:</strong>
                    {{ $restaurant->delivery_enabled ? 'Yes' : 'No' }} <!-- Check if delivery is enabled -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Dine-in Enabled:</strong>
                    {{ $restaurant->dine_in_enabled ? 'Yes' : 'No' }} <!-- Check if dine-in is enabled -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Pickup Enabled:</strong>
                    {{ $restaurant->pickup_enabled ? 'Yes' : 'No' }} <!-- Check if pickup is enabled -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Logo:</strong>
                    @if($restaurant->logo)
                        <img src="{{ asset('storage/' . $restaurant->logo) }}" alt="Logo" style="max-width: 200px;">
                    @else
                        N/A
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Cover Image:</strong>
                    @if($restaurant->cover_image)
                        <img src="{{ asset('storage/' . $restaurant->cover_image) }}" alt="Cover Image" style="max-width: 200px;">
                    @else
                        N/A
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Created At:</strong>
                    {{ $restaurant->created_at->format('d-M-Y h:i:s A') ?? 'N/A' }} <!-- Format created at or return 'N/A' -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
