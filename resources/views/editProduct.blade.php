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

  <link rel="stylesheet" href="{{ asset('css/editProductStyle.css')}}">


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
              <a class="dropdown-item" href="addcategory.html">Add Category</a>

            </div>
          </li>
          <li class="nav-item"><a href="index.html" class="nav-link logoutBtn"><i class="fa fa-sign-out" aria-hidden="true"></i>
              Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- BODY -->
  <div class="container productForm" >
    <h1>Edit Product</h1>
    <form method="POST" action="{{route('updateProduct', ['id' => $selectedProduct->id])}}"  enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="updateProductName">Product Name</label>
        <input type="text" class="form-control" id="updateProductName" name="updateProductName" placeholder="Product Name" value="{{$selectedProduct->productName}}">
      </div>
      <div class="form-group">
        <label for="updateProductName">Product Description</label>
        <input type="text" class="form-control" id="updateProductDescription" name="updateProductDescription" placeholder="Product Description" value="{{$selectedProduct->productDescription}}">
        <!-- <textarea class="form-control" id="productDescription" rows="20" placeholder="Product Description"></textarea> -->
      </div>
      <div class="form-group">
        <label for="updateProductPrice">Product Price</label>
        <input type="text" class="form-control textarea" id="updateProductPrice" name="updateProductPrice" placeholder="Product Price" value="{{$selectedProduct->productPrice}}">
      </div>
      <div class="form-group">
        <label for="updateProductCategory">Product Category</label>
        <select class="form-control" id="updateProductCategory" name="updateCategoryID" value="{{$selectedProduct->category->categoryName}}">
         
        @foreach($categories as $category)
          <option value="{{$category->id}}" id="updateCategoryID" name="updateCategoryID">{{$category->categoryName}}</option>

          @endforeach
        </select>

        @if ($errors->has('updateCategoryID'))
              <span class="text-danger">{{ $errors->first('updateCategoryID') }}</span>
              @endif
      </div>
      <div class="form-group">
        <label for="updateProductImage">Product Image</label>
        <input type="file" class="form-control-file" id="updateProductImage" name="updateProductImage">
      </div>
      <div class="row">
        <div class="col-12">
          <button id="saveProduct" class="btn btn-secondary saveBtn">Save</button>
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
                <input class="form-control" type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
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