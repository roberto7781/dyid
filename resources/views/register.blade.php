<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">


  <!-- Navbar -->
  <link rel="stylesheet" href="{{ asset('css/navbarStyle.css')}}">
  <script src="{{ asset('js/navbar.js')}}"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href=" {{mix ('css/app.css')}}">
  <!-- Navbar -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="{{ asset('css/registerStyle.css')}}">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark " id="ftco-navbar">
    <div class="container navbarContainer">
      <a class="navbar-brand" href="index.html">DY.ID</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <div class="collapse navbar-collapse order-sm-last" id="ftco-nav">
        <form action="#" class="searchform  m-auto">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
          </div>
        </form>
        <ul class="navbar-nav " style="margin-left: auto;">
          <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>

          <li class="nav-item"><a href="./index.html" class="nav-link loginBtn"><i class="fa fa-sign-in" aria-hidden="true"></i>
              Login</a></li>
          <li class="nav-item"><a href="#" class="nav-link logoutBtn"><i class="fa fa-user-plus" aria-hidden="true"></i>
              Register</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Body -->
  <div class="backgroundContainer">
    <div class="container" style="padding: 40px;">

      <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->


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

              <input type="email" name="userEmail" class="form-control" id="userEmail" required />
              <label for="email">Email</label>
              @if ($errors->has('userEmail'))
                <span class="text-danger">{{ $errors->first('userEmail') }}</span>
                @endif
              <small id="email_error" class="form-text text-muted"></small>
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
            <span><a href="index.php">Login</a> </span>

          </form>

        </div>
        <div class="card-footer">

        </div>
      </div>

    </div>
  </div>


  <div class="d-flex flex-column ">
    <!-- FOOTER -->
    <footer class="w-100 py-4 flex-shrink-0">
      <div class="container py-4">
        <div class="row gy-4 gx-5">

          <div class="col-lg-4 col-md-4">
            <h5 class="h1 text-white">DY.ID</h5>
            <p class="small text-muted">DY.ID is a famous electronic store in Indonesia made by information systems
              student.</p>

          </div>
          <div class="col-2"></div>
          <div class="col-lg-6 col-md-6">
            <h5 class="text-white mb-3">For Inquiries</h5>
            <p class="small text-muted">Although we make every effort to promptly respond to any questions we receive,
              please understand that there may be cases where we will not be able to provide an answer or we may require
              significant time before providing a response.</p>
            <form action="#">
              <div class="input-group mb-3">
                <input class="form-control" type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
              </div>
            </form>
          </div>


        </div>
      </div>
    </footer>
  </div>
</body>

<!-- Navbar -->
<!-- Bootstrap 5 JSS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/navbar.js"></script>

</html>