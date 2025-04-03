@extends('admin.layouts.app_prelayout')

@section('content')
<div class="container">
    <div class="login-panel">
        <div class="login">
            <div class="card-header">
                <div class="logo">
                    <a href="#"><img src="{{ asset('/images/logo.png') }}" alt=""></a>
                </div>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="login-card">
                <div class="card-header">{{ __('Enter OTP') }}</div>

                <form method="POST" action="{{ route('admin.verifyotpsubmit') }}">
                    @csrf

                    <div class="form-group">
                        <label for="otp">{{ __('OTP Code') }}</label>
                        <input 
                            id="otp" 
                            type="text" 
                            class="form-control @error('otp') is-invalid @enderror" 
                            name="otp" 
                            value="{{ old('otp') }}" 
                             
                            autofocus 
                            maxlength="6"
                            pattern="\d{6}" 
                            inputmode="numeric"
                            oninput="this.value = this.value.replace(/\D/g, '').slice(0, 6)">
                        
                        @error('otp')
                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    

                    <button type="submit" class="btn btn-primary mt-3">
                        {{ __('Submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
