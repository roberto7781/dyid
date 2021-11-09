<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" ></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">


  <!-- Navbar -->
  <link rel="stylesheet" href="{{ asset('css/navbarStyle.css')}}">
  <script src="{{ asset('js/navbar.js')}}"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href=" {{mix ('css/app.css')}}">

  <!-- My Own CSS -->
  <link rel="stylesheet" href="{{ asset('css/loginStyle.css')}}">

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

          <li class="nav-item"><a href="#" class="nav-link loginBtn"><i class="fa fa-user" aria-hidden="true"></i>
              Login</a></li>
          <li class="nav-item"><a href="./register.html" class="nav-link logoutBtn"><i class="fa fa-user-plus" aria-hidden="true"></i>
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

              <input type="userPassword" class="form-control" name="userPassword" id="userPassword" required />
              <label>Password</label>
              @if ($errors->has('userPassword'))
                <span class="text-danger">{{ $errors->first('userPassword') }}</span>
                @endif
              <small id="password_error" class="form-text text-muted"></small>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Login</button>
            <span><a href="register.php">Register</a> </span>
          </form>

        </div>
        <div class="card-footer">
          <span><a href="#">Forgot Password?</a> </span>
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