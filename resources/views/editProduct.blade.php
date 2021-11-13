@extends('pageLayout')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editProductStyle.css')}}">
@endpush

@section('content')
<div class="container productForm" >
    <h1>Edit Product</h1>
    <form method="POST" action="{{route('updateProduct', ['id' => $selectedProduct->id])}}"  enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="updateProductName">Product Name</label>
        <input type="text" class="form-control" id="updateProductName" name="updateProductName" placeholder="Product Name" value="{{$selectedProduct->productName}}">
      </div>
      <div class="form-group">
        <label for="updateProductName">Product Description</label>
        <input type="text" class="form-control" id="updateProductDescription" name="updateProductDescription" placeholder="Product Description" value="{{$selectedProduct->productDescription}}">
        <!-- <textarea class="form-control" id="productDescription" rows="20" placeholder="Product Description"></textarea> -->
      </div>
      <div class="form-group">
        <label for="updateProductPrice">Product Price</label>
        <input type="text" class="form-control textarea" id="updateProductPrice" name="updateProductPrice" placeholder="Product Price" value="{{$selectedProduct->productPrice}}">
      </div>
      <div class="form-group">
        <label for="updateProductCategory">Product Category</label>
        <select class="form-control" id="updateProductCategory" name="updateCategoryID" value="{{$selectedProduct->category->categoryName}}">
         
        @foreach($categories as $category)
          <option value="{{$category->id}}" id="updateCategoryID" name="updateCategoryID">{{$category->categoryName}}</option>

          @endforeach
        </select>

        @if ($errors->has('updateCategoryID'))
              <span class="text-danger">{{ $errors->first('updateCategoryID') }}</span>
              @endif
      </div>
      <div class="form-group">
        <label for="updateProductImage">Product Image</label>
        <input type="file" class="form-control-file" id="updateProductImage" name="updateProductImage">
      </div>
      <div class="row">
        <div class="col-12">
          <button id="saveProduct" class="btn btn-secondary saveBtn">Save</button>
        </div>
      </div>

    </form>

  </div>

@endsection
