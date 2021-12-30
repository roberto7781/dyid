@extends('pageLayout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/transactionHistoryStyle.css')}}">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
@endpush
@section('content')
<div class="mainContainer">
  <div class="container transactionContainer" style="max-width: 90%;">
    <h1>My Transaction History</h1>
    <div class="row">
      @if(!$transactions->isEmpty())
      <div id="accordion" style="width: 100%;">
        @foreach($transactions as $transaction)
        <div class="card">
          <div class="card-header panel-heading" id="headingOne" role="tab">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" href="#multiCollapse{{$transaction->id}}" aria-expanded="true" aria-controls="collapseOne">
                {{$transaction->created_at}}
              </a>
            </h4>
          </div>
          <div id="multiCollapse{{$transaction->id}}" class="panel-collapse collapse">
            @php
            $totalPrice = 0;
            @endphp
            @foreach($transaction->transaction_details as $transactionDetail)
            @php
            $totalPrice += $transactionDetail->price * $transactionDetail->quantity
            @endphp
            <div class="card-body">
              <div class="row transactionDetailContainer">
                <div class="col-12 col-lg-3 transactionDetailImage m-auto">
                  <img src="../storage/images/{{$transactionDetail->product->productImage}}" style="max-width: 100%;padding:5%;display: block;
  margin-left: auto;
  margin-right: auto;
 ">
                </div>
                <div class="col-12 col-lg-9 transactionDetailDescription" style="margin: 30px 0;">
                  <div class="topText">
                    <p style="font-size:xx-large;font-weight:500">{{$transactionDetail->product->productName}} <sup style="font-weight: 400;font-size:medium">(IDR. {{$transactionDetail->price}})</sup></p>
                  </div>
                  <p style="font-size: 24px;">x{{$transactionDetail->quantity}} pcs</p>
                  <p style="font-size: 24px;">IDR. {{$transactionDetail->price * $transactionDetail->quantity}}</p>
                </div>
              </div>

              <div class="row" style="margin-top: 2rem;">
                <div class="col-12" >
                  <p style="float: right;">Total Price: IDR. {{$totalPrice}}</p>
           
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>
      @else
      <div class="card">
        <div class="card-body">
          You haven't made any transaction...
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
<script>
  $('.collapse').on('shown.bs.collapse', function() {

    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.collapse').on('hide.bs.collapse', function() {

    $(this).siblings('.panel-heading').removeClass('active');
  });
</script>
@endsection