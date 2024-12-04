<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Print 4 Less') }}</title>
  <link rel="icon" type="image/png" sizes="32x32" href="https://www.printit4less.com/wp-content/themes/PrintIt4Less/favicon-32x32.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="{{asset('admin/css/login_style.css')}}" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <style type="text/css">
    body{
      background: #F8F9FA;
    }
  </style>
</head>
<body>

<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="login-panel">
      <div class="login">
              <div class="card-header"><div class="logo"><a href="#"><img src="{{asset('/front/images/logo.png')}}" alt=""></a></div></div>
            <div class="login-card">
            <form method="POST" action="{{ route('admin.reset.password.post') }}">

            <h3>Reset Password</h3>
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">

              @if (Session::has('message'))
                   <div class="alert alert-success" role="alert">
                      {{ Session::get('message') }}
                  </div>
              @endif

                  <div class="login-field">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <span class="input-icon show-password"><i class="fa-solid fa-envelope"></i></span>
                  </div>

                  <div class="login-field">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <span class="input-icon show-password"><i class="fa-solid fa-eye"></i></span>
                  </div>

                  <div class="login-field">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                    <span class="input-icon show-password"><i class="fa-solid fa-eye"></i></span>
                  </div>
                    <button class="btn btn-primary" type="submit">{{ __('Reset Password') }}</button>
            </form>
          </div>
          </div>
          </div>
          </div>
</section>

</body>
</html>
