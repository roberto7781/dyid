@extends('pageLayout')

@push('styles')
<link rel="stylesheet" href="{{ assets('css/transactionHistoryStyle.css')}}">
@endpush

@section('content')
<div class="mainContainer">

<div class="container" style="max-width: 90%;">
  <h1>My Transaction History</h1>
  <div class="row transactionContainer">

    <div class="col-12 ">
      <h3>12 April 2020</h3>
      <div class="row transactionDetailContainer">
        <div class="col-12 col-md-4 ">

          <img class="productImg " src="https://static.bmdstatic.com/pk/product/medium/5e3bd1cf6dbab.jpg">
        </div>
        <div class="col-md-1"></div>
        <div class="col-12 col-md-7 transactionDetailDescription">
          <div class="topText">
            <span>Acer</span>
            <span>dsafsdf</span>
          </div>
          <p>x2</p>
          <p style="float: right;">IDR: adfasdfsd</p>


        </div>
      </div>
      <div class="row totalPriceContainer">
        <div class="col-12 ">
          <div class="totalPrice" style="float: right;">
            <p>Total Price:</p>
            <p>sdfasdfsdafsd</p></div>
         
        </div>

        
      </div>
    </div>


  </div>



</div>

</div>

@endsection

