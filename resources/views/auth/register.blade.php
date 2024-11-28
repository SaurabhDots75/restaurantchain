@extends('admin.layouts.app_prelayout')

@section('content')
<div class="container">
<div class="login-panel">
<div class="login">
<div class="card-header"><div class="logo"><a href="#"><img src="http://127.0.0.1:8000/front/images/logo.png" alt=""></a></div></div>
                

                <div class="login-card">
                    <form method="POST" action="{{ route('admin.register') }}">
                    <h3>{{ __('Register') }}</h3>
                        @csrf
                            <div class="login-field">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="login-field">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="login-field">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
                                <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="login-field">
                                <input id="password-confirm" type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
                                <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                            </div>

                            <div class="register-btns">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                                <p>Already have an account?</p>
                                <button type="submit" class="btn btn-primary">
                                   Login
                                </button>
                            </div>

                    </form>
                </div>
                </div>
                </div>
@endsection
