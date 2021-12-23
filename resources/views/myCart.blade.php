@extends('pageLayout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/myCartStyle.css')}}">

@endpush

@section('content')
<div class="mainContainer">

  <div class="container" style="max-width: 90%;margin-top:2rem;margin-bottom:2rem">
    <h1>My Cart</h1>
    <div class="row cartContainer">
      <div class="col-12">
        @if(!$carts->isEmpty())
        @php
        $totalPrice = 0;
        @endphp
        @foreach($carts as $cart)
        @php
        $totalPrice += $cart->product->productPrice * $cart->quantity
        @endphp
        <div class="row cartDetailContainer">
          <div class="col-12 col-lg-3 cartImage m-auto">
            <img src="../storage/images/{{$cart->product->productImage}}" style="max-width: 100%;padding:5%;display: block;
  margin-left: auto;
  margin-right: auto;
 ">
          </div>

          <div class="col-12 col-lg-9 cartDescription" style="margin: 30px 0;">
            <div class="topText">
              <p style="font-size:xx-large;font-weight:500">{{$cart->product->productName}} <sup style="font-weight: 400;font-size:medium">(IDR. {{$cart->product->productPrice}})</sup></p>

            </div>

            <p style="font-size: 24px;">x{{$cart->quantity}} pcs</p>
            <p style="font-size: 24px;">IDR. {{$cart->product->productPrice * $cart->quantity}}</p>
            <form action="{{((route ('deleteCart', ['id' => $cart->productID])))}}" method="POST">
              @csrf
              <a class="btn btn-warning" id="button-addon2" type="button" href="{{((route('editCartView', ['id' => $cart->productID])))}}">Edit</a>
              <button class="btn btn-danger" id="button-addon2" type="submit">Delete</button>
            </form>

          </div>

        </div>
        @endforeach
        @else
        <div class="card">
          <div class="card-body">
            You have no items...
          </div>
        </div>

        @endif

      </div>

    </div>


    @if(!$carts->isEmpty())
    <div class="row">
      <div class="col-6">
        <p>Total Price:</p>
        <p>IDR. {{$totalPrice}}</p>
      </div>

      <div class="col-6">
        <a class="btn btn-primary" id="button-addon2" style="float: right;" href="{{route('checkOut')}}">Checkout</a>
      </div>
    </div>
    @endif

  </div>

</div>

@endsection