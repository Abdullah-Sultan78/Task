@extends('backend.master')
@section('title','Add Category')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12">
            <h3 class="text-center m-3">Add Category</h3>
            @if (Session::get('message')) 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{Session::get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{-- @if (Session::get('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{Session::get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            @endif --}}
            
            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label  class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter the category name">
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
              </form>
        </div>
    </div>
</div>

@endsection