@extends('pageLayout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/productDetailStyle.css')}}">
@endpush
@section('content')
<div class="mainContainer">
  <div class="container productDetailContainer" style="max-width: 85%;">

    <div class="row">
      <div class="col-12 col-lg-6 m-auto">
        <img src="../storage/images/{{$selectedCart->product->productImage}}" style="width:100%;padding:5%;display: block;
margin-left: auto;
margin-right: auto;">
      </div>
      <!-- <div class="col-1"></div> -->
      <div class="col-12 col-lg-6 m-auto">
        <h2>{{$selectedCart->product->productName}}</h2>
        <hr>
        <h3>Category:</h3>
        <p>{{$selectedCart->product->category->categoryName}}</p>
        <hr>
        <h3>Price:</h3>
        <p>{{$selectedCart->product->productPrice}}</p>
        <hr>
        <h3>Description:</h3>
        <p style="word-break:break-all;width:90%">{{$selectedCart->product->productDescription}}</p>
        <hr>
        <div class="row">
          <div class="col-12">
            <form action="{{route('updateCart',  ['id' => $selectedCart->productID])}}" method="POST">
              @csrf
              <div class="form-group row">
                <label for="updateQuantity" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="updateQuantity" name="updateQuantity" placeholder="Qty" value="{{$selectedCart->quantity}}">
                </div>

                <div class="col-sm-6">
                  <button type="submit" class="btn btn-primary mb-2">Update</button>
                </div>
                @if ($errors->has('updateQuantity'))
                <div class="col-12"><span class="text-danger">{{ $errors->first('updateQuantity') }}</span></div>
                @endif
              </div>
            </form>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection