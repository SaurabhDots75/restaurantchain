@extends('admin.layouts.app_prelayout')

@section('content')
<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm mt-5">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!">
                <img src="{{asset('/front/images/logo.png')}}" alt="BootstrapBrain Logo" width="250">
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Reset Password</h2>
            <form method="POST" action="{{ route('admin.forget.password.post') }}">
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

              <div class="row gy-2 overflow-hidden">

                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">{{ __('Send Password Reset Link') }}</button>
                  </div>
                </div>

              </div>
            </form>
          </div>
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
