<!DOCTYPE html>
<html lang="en">
<head>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Navbar -->
<link rel="stylesheet" href="{{ asset('css/navbarStyle.css')}}">
<script src="{{ asset('js/navbar.js')}}"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href=" {{mix ('css/app.css')}}">
<!-- Navbar -->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

@stack('styles')


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="{{url('/images/Logo_DYID_Black.png')}}" type="images/png">

</head>
<body>
@include('navbar')
  <div class="container" style="max-width:100%">
    @yield('content')
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

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/navbar.js"></script>

</html>