@extends('pageLayout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/addCategoryStyle.css')}}">

@endpush

@section('content')
<div class="container categoryForm">
    <h1>Insert New Category</h1>
    <form action="{{((route('createCategory')))}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="categoryName">Category Name</label>
        <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Category Name">
      </div>
      <div class="row">
        <div class="col-12">
          <button id="insertCategory" class="btn btn-secondary insertBtn">Add</button>
        </div>
      </div>

    </form>

  </div>
@endsection

