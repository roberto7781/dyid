@extends('pageLayout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/productDetailStyle.css')}}">
@endpush

@section('content')
<div class="mainContainer">
  <div class="container productDetailContainer" style="max-width: 85%;">

    <div class="row">
      <div class="col-12 col-lg-6 m-auto">
        <img src="../storage/images/{{$selectedProduct->productImage}}" style="width:100%;padding:5%;display: block;
  margin-left: auto;
  margin-right: auto;">

      </div>

      <div class="col-12 col-lg-6 m-auto">
        <h2>{{$selectedProduct->productName}}</h2>
        <hr>
        <h3>Category:</h3>
        <p>{{$selectedProduct->category->categoryName}}</p>
        <hr>
        <h3>Price:</h3>
        <p>{{$selectedProduct->productPrice}}</p>
        <hr>
        <h3>Description:</h3>
        <p style="word-break:break-all;width:90%">{{$selectedProduct->productDescription}}</p>
        <hr>
        <div class="row">
          <div class="col-12">
            <form action="{{route('addToCart',  ['id' => $selectedProduct->id])}}" method="POST">
              @csrf

              @if(Auth::guest() || Auth::user()->hasRole('Member'))
              <div class="form-group row">
                <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="inputQuantity" name="inputQuantity" placeholder="Qty">
                </div>

                <div class="col-sm-6">
                  @if(!Auth::guest() && Auth::user()->hasRole('Member'))
                  <button type="submit" class="btn btn-primary mb-2">Buy</button>
                  @elseif(Auth::guest())
                  <a class="btn btn-warning mb-2" href="{{route('loginView')}}">Login to buy</a>

                  @endif
                </div>
                @if ($errors->has('inputQuantity'))
                <div class="col-12"><span class="text-danger">{{ $errors->first('inputQuantity') }}</span></div>
                @endif
              </div>
              @endif

            </form>


            </form>

          </div>
        </div>

      </div>

    </div>


  </div>
</div>

@endsection