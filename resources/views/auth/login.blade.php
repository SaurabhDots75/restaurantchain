@extends('admin.layouts.app_prelayout')

@section('content')
<div class="container">
    <div class="login-panel">
            <div class="login">
                <!--<div class="card-header">{{ __('Login') }}</div>-->

                <div class="card-header"><div class="logo"><a href="#"><img src="{{asset('/images/logo.png')}}" alt=""></a></div></div>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="login-card">
                    <form method="POST" action="{{ route('admin.login') }}">
                        <h3>Sign in to start your session</h3>
                        @csrf

                        <div class="login-field">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('email@domain.com') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="login-field">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                                <span class="input-icon show-password"><i class="fa-solid fa-eye"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <a class="btn btn-link" href="{{ route('admin.forget.password.get') }}">Forgot Your Password?</a>

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

@section('custom_js_scripts')
<script>
    $(document).ready(function() {
        $('.show-password').on('click', function(e) {
            var target = e.currentTarget;
            $(target).hasClass('show') ? hidePassword($(target)) : showPassword($(target));
        });
    });

    function hidePassword(e) {
        // Correctly find the icon within the target element (the show-password span)
        var icon = e.find('svg');
        icon.removeClass('fa-eye-slash').addClass('fa-eye');
        e.removeClass('show').addClass('hide');
        e.prev('input').attr('type', 'password');
    }

    function showPassword(e) {
        // Correctly find the icon within the target element (the show-password span)
        var icon = e.find('svg');
        icon.removeClass('fa-eye').addClass('fa-eye-slash');
        e.removeClass('hide').addClass('show');
        e.prev('input').attr('type', 'text');
    }
</script>
@endsection