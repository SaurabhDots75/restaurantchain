@extends('admin.layouts.app_prelayout')

@section('content')
<div class="container">
    <div class="login-panel">
            <div class="login">
                <!--<div class="card-header">{{ __('Login') }}</div>-->

                <div class="card-header"><div class="logo"><a href="#"><img src="http://127.0.0.1:8000/front/images/logo.png" alt=""></a></div></div>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="login-card">
                    <form method="POST" action="{{ route('admin.login') }}">
                        <h3>Sign in to start your session</h3>
                        @csrf

                        <div class="login-field">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="login-field">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                                <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <a class="btn btn-link" href="#">Forgot Your Password?</a>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
