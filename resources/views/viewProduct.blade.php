@extends('pageLayout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/viewProductStyle.css')}}">
@endpush

@section('content')
<div class="container">
  <h1>Manage Product</h1>
  @if(!$products->isEmpty())
  <table class="table table-striped" style="padding: 0px 20px;">
    <thead class="thead-dark">
      <tr>
        <th scope="col-1">No</th>
        <th scope="col-3">Product Image</th>
        <th scope="col-1">Product Name</th>
        <th scope="col-3">Product Description</th>
        <th scope="col-1">Product Price</th>
        <th scope="col-1">Product Category</th>
        <th scope="col-2">Action</th>
      </tr>
    </thead>
    <tbody>
      @php
      $i=0;
      @endphp
      @foreach($products as $product)
      @php
      $i++;
      @endphp
      <tr>
        <td scope="row">{{$i}}</td>
        <td><img src="../storage/images/{{$product->productImage}}" width="150px"></td>
        <td>{{$product->productName}}</td>
        <td style="word-break:break-all;width:30%">{{$product->productDescription}}</td>
        <td>{{$product->productPrice}}</td>
        <td>{{$product->category->categoryName}}</td>
        <td>

          <form action="{{((route ('deleteProduct', ['id' => $product->id])))}}" method="POST">
            @csrf
            <a id="updateProduct" class="btn btn-secondary updateBtn" href="{{((route ('editProductView', ['id' => $product->id])))}}">Update</a>
            <button id="deleteProduct" class="btn btn-danger deleteBtn">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @else
  <div class="card">
        <div class="card-body">
        There isn't any product...
        </div>
      </div>
  @endif
</div>
@endsection