@extends('guestLayout')
@section('title')
  <title>Welcome to DYID</title>
@endsection

@section('content')
  <div class="container " style="padding: 40px;max-width: 85%;">

    <div class="row">

      @foreach($products as $product)
      <div class="col-6 col-md-4 productContainer">
        <div class="card ">
          <img class="card-img-top productImage" id="productImage" name="productImage" src="{{url('/images/'.$product->productImage)}}" alt="Card image cap">
          <div class="card-body">
            <div class="row">

              <div class="col-6">
                <h3 class="card-text productName" id="productName" name="productName">{{$product->productName}}</h3>
              </div>
              <div class="col-2"></div>
              <div class="col-4">
                <p class="card-text productCategory" id="productCategory" name="productCategory" style="align-items: center;">{{$product->category->categoryName}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <p class="card-text productPrice" id="productPrice" name="productPrice">{{$product->productPrice}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-12">

                <a id="productDetail" class="btn btn-secondary buyBtn" href="{{((route ('viewProductDetail', ['id' => $product->id])))}}">Buy Now</a>

              </div>
            </div>
          </div>
        </div>
      </div>

      @endforeach
    </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <div class="paginationContainer">

  </div>
@endsection