@extends('admin.layouts.app_prelayout')

@section('content')
<section class="bg-light py-3 py-md-5">
  <div class="container">
  <div class="login-panel">
  <div class="login">



        
  <div class="card-header">
    <div class="logo">
              <a href="#"><img src="{{asset('/front/images/logo.png')}}" alt="BootstrapBrain Logo"></a>
    </div>
</div>
            <div class="login-card">
            
            <form method="POST" action="{{ route('admin.forget.password.post') }}">
            <h3>Reset Password</h3>
              @csrf

              @if (Session::has('message'))
                   <div class="alert alert-success" role="alert">
                      {{ Session::get('message') }}
                  </div>
              @endif

              @error('email')
                  <div class="alert alert-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </div>
              @enderror


                  <div class="login-field">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                  </div>

                    <button class="btn btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
            </form>
          </div>
          </div>
          </div>
  </div>
</section>
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
