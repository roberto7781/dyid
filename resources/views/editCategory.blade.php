@extends('pageLayout')
<link rel="stylesheet" href="{{ asset('css/editCategoryStyle.css')}}">
@push('styles')

@endpush

@section('content')
<div class="container categoryForm">
        <h1>Edit Category</h1>
        <form method="POST" action="{{route('updateCategory', ['id' => $selectedCategory->id])}}">
          @csrf
            <div class="form-group">
              <label for="categoryName">Category Name</label>
              <input type="text" class="form-control" id="categoryName" name="updateCategoryName" value="{{$selectedCategory->categoryName}}" placeholder="Category Name">
              @if ($errors->has('updateCategoryName'))
              <span class="text-danger">{{ $errors->first('updateCategoryName') }}</span>
              @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <button id="saveCategory" class="btn btn-secondary saveBtn">Save</button>
                </div>
            </div>
            
          </form>
          
    </div>
    

@endsection
