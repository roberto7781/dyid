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

  <link rel="stylesheet" href="{{ asset('css/myCartStyle.css')}}">

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

          <li class="nav-item"><a href="#" class="nav-link logoutBtn"><i class="fa fa-sign-in" aria-hidden="true"></i>
              Login</a></li>
          <li class="nav-item"><a href="./register.html" class="nav-link logoutBtn"><i class="fa fa-user-plus" aria-hidden="true"></i>
              Register</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Body -->
  <div class="mainContainer">

    <div class="container" style="max-width: 90%;">
      <h1>My Cart</h1>
      <div class="row cartContainer">
        <div class="col-12">


          <div class="row cartDetailContainer">
            <div class="col-12 col-md-4 cartImage">
              <img src="https://static.bmdstatic.com/pk/product/medium/5e3bd1cf6dbab.jpg">
            </div>
            <div class="col-md-1"></div>
            <div class="col-12 col-md-7 cartDescription">
              <div class="topText">
                <span>Acer</span>
                <span>dsafsdf</span>
              </div>

              <h2>asdfdsf</h2>
              <h2>asdasdsa</h2>
              <button class="btn btn-primary" id="button-addon2" type="button">Buy</button>
              <button class="btn btn-primary" id="button-addon2" type="button">Buy</button>
            </div>

          </div>

          <div class="row cartDetailContainer">
            <div class="col-12 col-md-4 cartImage">
              <img src="https://static.bmdstatic.com/pk/product/medium/5e3bd1cf6dbab.jpg">
            </div>
            <div class="col-md-1"></div>
            <div class="col-12 col-md-7 cartDescription">
              <div class="topText">
                <span>Acer</span>
                <span>dsafsdf</span>
              </div>

              <h2>asdfdsf</h2>
              <h2>asdasdsa</h2>
              <button class="btn btn-primary" id="button-addon2" type="button">Buy</button>
              <button class="btn btn-primary" id="button-addon2" type="button">Buy</button>
            </div>

          </div>
        </div>

      </div>



      <div class="row">
        <div class="col-6">
          <p>Total Price:</p>
          <p>sdfasdfsdafsd</p>
        </div>

        <div class="col-6">
          <button class="btn btn-primary" id="button-addon2" type="button" style="float: right;">Buy</button>
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