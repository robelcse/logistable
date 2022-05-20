@extends('layout.guest')
@section('title','Login')
@section('content')
<section>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-12 p-0">
        <div class="login-card">
          <form method="POST" class="theme-form login-form" action="{{ route('register') }}">
            @csrf
            <h4>Create your account</h4>
            <h6>Enter your personal details to create account</h6>
            <div class="form-group">
              <label for="name">Name</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                <input class="form-control" type="text" name="name" value="{{old('name')}}" id="name" required autofocus placeholder="Full name">
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}" required autofocus placeholder="test@gmail.com">
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="*********">
                <div class="show-hide"><span class="show"></span></div>
              </div>
            </div>
            <div class="form-group">
              <label for="password_confirmation">Password</label>
              <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="*********">
                <div class="show-hide"><span class="show"></span></div>
              </div>
            </div>

            <!-- <div class="form-group">
                  <div class="checkbox">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Agree with <span>Privacy Policy                   </span></label>
                  </div>
                </div> -->
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">Create Account</button>
            </div>
            <div class="login-social-title">
              <h5>signup with</h5>
            </div>
            <div class="form-group">
              <ul class="login-social">
                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="linkedin"></i></a></li>
                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="facebook"></i></a></li>
                <li><a href="https://www.instagram.com/login" target="_blank"><i data-feather="instagram"> </i></a></li>
              </ul>
            </div>
            <p>Already have an account?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection