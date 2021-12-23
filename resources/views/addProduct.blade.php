@extends('pageLayout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/addProductStyle.css')}}">
@endpush

@section('content')
<div class="container productForm">
    <h1>Insert New Product</h1>
    <form method="POST" action="{{route('createProduct')}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="productName">Product Name</label>
        <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name">
        @if ($errors->has('productName'))
        <span class="text-danger">{{ $errors->first('productName') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="productName">Product Description</label>
        <input type="text" class="form-control" id="productDescription" name="productDescription" placeholder="Product Description">
        @if ($errors->has('productDescription'))
        <span class="text-danger">{{ $errors->first('productDescription') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="productName">Product Price</label>
        <input type="text" class="form-control textarea" id="productPrice" name="productPrice" placeholder="Product Price">
        @if ($errors->has('productPrice'))
        <span class="text-danger">{{ $errors->first('productPrice') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="productCategory">Product Category</label>
        <select class="form-control" id="productCategory" name="categoryID">

          @foreach($categories as $category)
          <option value="{{$category->id}}" name="categoryID">{{$category->categoryName}}</option>

          @endforeach
        </select>
        @if ($errors->has('categoryID'))
              <span class="text-danger">{{ $errors->first('categoryID') }}</span>
              @endif
      </div>
      <div class="form-group">
        <label for="productImage">Product Image</label>
        <input type="file" class="form-control-file" id="productImage" name="productImage">
        @if ($errors->has('productImage'))
              <span class="text-danger">{{ $errors->first('productImage') }}</span>
              @endif
      </div>
      <div class="row">
        <div class="col-12">
          <button id="insertProduct" class="btn btn-secondary insertBtn">Add</button>
        </div>
      </div>
    </form>
  </div>
@endsection