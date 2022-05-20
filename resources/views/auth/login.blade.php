@extends('layout.guest')
@section('title','Login')
@section('content')
<div class="col-12">
  <div class="login-card">

    <form class="theme-form login-form" method="POST" action="{{ route('login') }}">
      @csrf
      <h4>Login</h4>
      <h6>Welcome back! Log in to your account.</h6>
      {{session('status')}}
      <h6>{{ $errors->first('email')}}</h6>
      <div class="form-group">
        <label>Email Address</label>
        <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
          <input class="form-control" type="email" name="email" value="{{old('email') ? old('email') : 'mdrobel.cse@gmail.com'}}" required autofocus placeholder="test@gmail.com">
        </div>
      </div>
      <div class="form-group">
        <label>Password</label>
        <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
          <input class="form-control" id="password" type="password" name="password" value="11111111" required autocomplete="current-password" placeholder="**********">
          <div class="show-hide"><span class="show"></span></div>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <input id="checkbox1" type="checkbox" name="remember">

          <label for="checkbox1">Remember password</label>
        </div>
        @if (Route::has('password.request'))

        <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
        @endif

      </div>
      <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">Log in</button>
      </div>
      <div class="login-social-title">
        <h5>Sign in with</h5>
      </div>
      <div class="form-group">
        <ul class="login-social">
          <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="linkedin"></i></a></li>
          <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="twitter"></i></a></li>
          <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="facebook"></i></a></li>
          <li><a href="https://www.instagram.com/login" target="_blank"><i data-feather="instagram"> </i></a></li>
        </ul>
      </div>
      <p>Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account </a></p>
    </form>
  </div>
</div>
@endsection