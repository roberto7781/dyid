@extends('pageLayout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/viewCategoryStyle.css')}}">
@endpush

@section('content')
<div class="container">
  <h1>Manage Category</h1>
  @if(!$categories->isEmpty())
  <table class="table table-striped" style="padding: 0px 20px;">
    <thead class="thead-dark">
      <tr>
        <th scope="col-2">No</th>
        <th scope="col-6">Category Name</th>
        <th scope="col-4">Action</th>
      </tr>
    </thead>
    <tbody>
      @php
      $i = 0
      @endphp
      @foreach($categories as $category)
      @php
      $i++
      @endphp
      <tr>
        <th scope="row">{{$i}}</th>
        <td>{{$category->categoryName}}</td>

        <td>
          <form action="{{((route ('deleteCategory', ['id' => $category->id])))}}" method="POST">
            @csrf
            <a id="updateCategory" class="btn btn-secondary updateBtn" href="{{((route ('editCategoryView', ['id' => $category->id])))}}">Update</a>
            <button id="DELETECategory" class="btn btn-danger deleteBtn">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @else
  <div class="card">
    <div class="card-body">
      There isn't any category...
    </div>
  </div>


  @endif
</div>


@endsection