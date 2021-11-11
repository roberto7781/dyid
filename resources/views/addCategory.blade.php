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
  <!-- Navbar -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="{{ asset('css/addCategoryStyle.css')}}">


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{url('/images/Logo_DYID_Black.png')}}" type="images/png">
  <title>Add Product Category</title>
</head>

<body>
  
  <!-- HEADER -------------------------------------------------------------------------------------- -->
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark " id="ftco-navbar">
    <div class="container">
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Product</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="viewproduct.html">View Product</a>
              <a class="dropdown-item" href="addproduct.html">Add Product</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Category</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="viewcategory.html">View Category</a>
              <a class="dropdown-item" href="#">Add Category</a>

            </div>
          </li>
          <li class="nav-item"><a href="index.html" class="nav-link logoutBtn"><i class="fa fa-sign-out" aria-hidden="true"></i>
              Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- BODY -->
  <div class="container categoryForm">
    <h1>Insert New Category</h1>
    <form action="{{((route('createCategory')))}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="categoryName">Category Name</label>
        <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Category Name">
      </div>
      <div class="row">
        <div class="col-12">
          <button id="insertCategory" class="btn btn-secondary insertBtn">Add</button>
        </div>
      </div>

    </form>

  </div>


  <!-- FOOTER -->
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
                <input class="form-control" type="text">
                <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
              </div>
            </form>
          </div>


        </div>
      </div>
    </footer>
  </div>

  <!-- Navbar -->
  <!-- Bootstrap 5 JSS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/navbar.js"></script>

</html>