@extends('pageLayout')

@push('styles')
<link rel="stylesheet" href="{{ asset(('css/homeStyle.css'))}}">
@endpush

@section('content')
<div class="container paginationContainer">

  <div class="row">
    @if(!$products->isEmpty())
    @foreach($products as $product)
    <div class="col-12 col-md-6 col-lg-4 productContainer">
      <div class="card " style="max-height: 100%; height:100%">
        <img class="card-img-top productImage" id="productImage" name="productImage" src="../storage/images/{{$product->productImage}}" alt="Card image cap">
        <div class="card-body">
          <div class="row">

            <div class="col-6">
              <h2 class="card-text productName" id="productName" name="productName">{{$product->productName}}</h2>
            </div>
            <div class="col-2"></div>
            <div class="col-4">
              <p class="card-text productCategory" id="productCategory" name="productCategory" style="align-items: center;">{{$product->category->categoryName}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <p class="card-text productPrice" id="productPrice" name="productPrice">IDR. {{$product->productPrice}}</p>
            </div>
          </div>
   
              

           
        </div>
        <div class="card-footer" style="border-top: 0px;background:transparent">
        <a id="productDetail" class="btn btn-secondary buyBtn" href="{{((route ('productDetailView', ['id' => $product->id])))}}" >More Detail</a>
        </div>
      </div>
    </div>
    @endforeach
    @else
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          Sorry, there isn't any product available at this time...
        </div>
      </div>
    </div>

    @endif

  </div>

  <div class="container" style="max-width: 90%;width:90%;margin:0">
    {{$products->links('pagination::bootstrap-4')}}
  </div>


</div>


@endsection