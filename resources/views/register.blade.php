@extends('pageLayout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/registerStyle.css')}}">
@endpush

@section('content')
<div class="backgroundContainer">
    <div class="container" style="padding: 40px;">
      <div class="card mx-auto" style="background-color:rgba(255, 255, 255, 0.85);
  box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
  width: 60%; border-radius:  15px;">
        <div class="card-header" style="font-family: 'Montserrat', sans-serif;">Register</div>
        <div class="card-body">
          <form id="register_form" action="{{route ('userRegistration')}}" autocomplete="off" method="POST">
            @csrf
            <div class="form-group" style="margin-top:10px">

              <input id="userName" type="text" name="userName" id="userName" class="form-control" required />
              <label for="userName">Name</label>
              @if ($errors->has('userName'))
              <span class="text-danger">{{ $errors->first('userName') }}</span>
              @endif
            </div>

            <p style="margin-bottom: 0;font-weight: 600;">Gender</p>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="userGender" value="Male">Male
                @if ($errors->has('userGender'))
                <span class="text-danger">{{ $errors->first('userGender') }}</span>
                @endif
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="userGender" value="Female">Female
                @if ($errors->has('userGender'))
                <span class="text-danger">{{ $errors->first('userGender') }}</span>
                @endif
              </label>
            </div>

            <div class="form-group">
              <input id="userAddress" type="text" name="userAddress" class="form-control" required />
              <label for="userAddress">Address</label>
              @if ($errors->has('userAddress'))
                <span class="text-danger">{{ $errors->first('userAddress') }}</span>
                @endif

            </div>
            <div class="form-group">
            <input type="text" name="userEmail" class="form-control" id="userEmail" required />
              <label for="userEmail">Email</label>
          
              @if ($errors->has('userEmail'))
                <span class="text-danger">{{ $errors->first('userEmail') }}</span>
                @endif
    
            </div>

            <div class="form-group">

              <input type="password" name="userPassword" class="form-control" id="userPassword" required />
              <label for="userPassword">Password</label>
              @if ($errors->has('userPassword'))
                <span class="text-danger">{{ $errors->first('userPassword') }}</span>
                @endif
              <small id="password1_error" class="form-text text-muted"></small>
            </div>

            <div class="form-group">

              <input type="password" name="userPassword_confirmation" class="form-control" id="userPassword_confirmation" required />
              <label for="userPassword_confirmation">Re-enter Password</label>
              <small id="password2_error" class="form-text text-muted"></small>
            </div>
            
            <div class="form-check" style="margin-bottom: 20px;">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required />
              <label class="form-check-label" for="exampleCheck1">I agree with terms & conditions</label>
            </div>

            <!-- <div class="form-group">
                 <label for="userType">Usertype</label>
                 <select name="userType" class="form-control" id="userType">
                 <option value="">Choose User Type</option>
                 <option value="1">Admin</option>
                 <option value="0">Other</option>
                 </select>
                 <small id="type_error" class="form-text text-muted"></small>
               </div> -->
            <button type="submit" class="btn btn-primary"><i class="fa fa-user">&nbsp;</i>Register</button>
            <span><a href="{{route('loginView')}}">Login</a> </span>

          </form>

        </div>
        <div class="card-footer">

        </div>
      </div>

    </div>
  </div>

@endsection

