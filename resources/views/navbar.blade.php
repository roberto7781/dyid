@if(!Auth::guest() && Auth::user()->hasRole('Admin'))
<link rel="stylesheet" href="{{ asset('css/navbarAdminStyle.css')}}">
@endif


<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark " id="ftco-navbar">
  <div class="container navbarContainer">
    <a class="navbar-brand" href="{{route('productView')}}">
      <img style="height: 50px" src="{{url('/images/Logo_DYID_White.png')}}" alt="DYID Logo">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span> Menu
    </button>
    <div class="collapse navbar-collapse order-sm-last" id="ftco-nav">
      <form action="/search" method="GET" class="searchform  m-auto">
        <div class="form-group d-flex">
          <input type="text" class="form-control pl-3" placeholder="Search" name="query_param">
          <button type="submit" placeholder="" class="form-control search" value="Search"><span class="fa fa-search"></span></button>
        </div>
      </form>


      <ul class="navbar-nav " style="margin-left: auto;">
        <li class="nav-item active"><a href="{{route('productView')}}" class="nav-link">Home</a></li>

        <!-- Admin Option -->
        @if(!Auth::guest() && Auth::user()->hasRole('Admin'))
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Product</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="{{route('adminProductView')}}">View Product</a>
            <a class="dropdown-item" href="{{route('addProductView')}}">Add Product</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Category</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="{{route('categoryView')}}">View Category</a>
            <a class="dropdown-item" href="{{route('addCategoryView')}}">Add Category</a>

          </div>
        </li>

        <li class="nav-item"> <a href="{{ route('logOut') }}" class="nav-link logoutBtn" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i>Logout
          </a>
          <form id="frm-logout" action="{{ route('logOut') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>

        <!-- Member Option -->
        @elseif(!Auth::guest() && Auth::user()->hasRole('Member'))
        <li class="nav-item"><a href="{{route('cartView')}}" class="nav-link logoutBtn"><i class="fas fa-shopping-cart"></i>
            My Cart</a></li>
        <li class="nav-item"><a href="{{route('cartView')}}" class="nav-link logoutBtn"><i class="fas fa-history"></i>
            History Transaction</a></li>


        <li class="nav-item">
          <a href="{{ route('logOut') }}" class="nav-link logoutBtn" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i>Logout
          </a>
          <form id="frm-logout" action="{{ route('logOut') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
        <!-- Guest Option -->
        @else
        <li class="nav-item"><a href="{{route('loginView')}}" class="nav-link loginBtn"><i class="fas fa-sign-in-alt"></i>
            Login</a></li>
        <li class="nav-item"><a href="{{route('registerView')}}" class="nav-link registerBtn"><i class="fa fa-user-plus" aria-hidden="true"></i>
            Register</a></li>
        @endif

      </ul>
    </div>
  </div>
</nav>