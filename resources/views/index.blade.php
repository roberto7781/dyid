@extends('pageLayout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/loginStyle.css')}}">
@endpush

@section('content')
<div class="backgroundContainer">
  <div class="container" style="padding: 40px;">

    <div class="card mx-auto" style="background-color:rgba(255, 255, 255, 0.7);
  box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
  width: 50%; padding-top:30px;border-radius:  15px;">
      <!-- <img class="card-img-top mx-auto" style="width:60%;margin-top:7px" src="./images/Login.png" alt="Login Icon"> -->
      <div class="card-body">

        <span letter-spacing="normal" style="font-size:32px;margin-bottom:12px;font-family: 'Montserrat', sans-serif;font-weight:700;">
          Welcome back!</span>

        <div style="padding: 6px 0px 48px; display: block;">
          <span letter-spacing="normal" style="font-size:18px;margin-bottom:12px;font-family: 'Montserrat', sans-serif;">
            Log in to your account.</span>
        </div>


        <!-- <h5 class="card-title">Login</h5> -->
        <form id="login_form" method="POST" action="{{((route ('userLogin')))}}" style="font-family: 'Montserrat', sans-serif;">
          @csrf
          <div class="form-group" style="display: flex; flex-flow: column nowrap; justify-content: flex-start; align-items: normal;">

            <input type="text" class="form-control" name="userEmail" id="userEmail" required />
            <label>Email</label>
            @if ($errors->has('userEmail'))
            <span class="text-danger">{{ $errors->first('userEmail') }}</span>
            @endif
            <small id="email_error" class="form-text text-muted"></small>
          </div>

          <div class="form-group" style="display: flex; flex-flow: column nowrap; justify-content: flex-start; align-items: normal;margin-top:48px; margin-bottom: 30px">

            <input type="password" class="form-control" name="userPassword" id="userPassword" required />
            <label>Password</label>
            @if ($errors->has('userPassword'))
            <span class="text-danger">{{ $errors->first('userPassword') }}</span>
            @endif
            <small id="password_error" class="form-text text-muted"></small>
          </div>

          <div class="form-check" style="display: flex; flex-flow: column nowrap; justify-content: flex-start; align-items: normal;margin-bottom: 30px">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
            <label class="form-check-label" for="remember_me">Remember me</label>
          </div>

          <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Login</button>


          <span><a href="{{route('registerView')}}">Register</a> </span>
        </form>

      </div>
      <div class="card-footer">
        <span><a href="#">Forgot Password?</a> </span>
      </div>
    </div>

  </div>
</div>

@endsection