@extends('backend.master')
@section('title','Add Product')
@section('content')
<div class="container-fluid px-4  py-4">
    <div class="row">
        <div class="col-8 col-sm-8 offset-2">
            <h3 class="text-center m-3">Add Product</h3>
            {{-- @if (Session::get('message')) 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{Session::get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif --}}
            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
            {{-- @if (Session::get('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{Session::get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            @endif --}}
            
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label  class="form-label">Category</label>
                  <select name="category_id"  id="catagory_id" class="form-control">
                    <option value=""  >--Select Category--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                {{-- <select name="catagory_id" id="catagory_id" class="form-control">
                  <option value="">-- Select Catagory --</option>
                  @foreach ($catagorys as $catagory)
                      <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
                  @endforeach
              </select> --}}
                  {{-- <input type="text" class="form-control" name="category" placeholder="Enter the category name"> --}}
                </div>
                <div class="mb-3">
                  <label  class="form-label">Name</label>
                  <input type="string" class="form-control" name="name" placeholder="Enter the Name of product">
                </div>
                <div class="mb-3">
                  <label  class="form-label">Price</label>
                  <input type="float" class="form-control" name="price" placeholder="Enter the price">
                </div>
                <div class="mb-3">
                  <label  class="form-label">Quantity</label>
                  <input type="float" class="form-control" name="quantity" placeholder="Enter the quantity">
                </div>
                {{-- <div class="mb-3">
                  <div class="form-group my-3">
                      <input type="number" name="discount" class="form-control" placeholder="Discount %">
                  </div>
              </div> --}}
                <div class="mb-3">
                  <label  class="form-label">Description</label>
                  <input type="text" class="form-control" name="description" placeholder="Enter the description">
                </div>
                <div class="mb-3">
                  <label  class="form-label">Image</label>
                  <input type="file" class="form-control" name="image">
                </div>

                {{-- <div class="mb-3">
                  <div class="form-group my-3">
                      <label for="" class="form-label">Thumbnail</label>
                      <input type="file" name="thumbnail[]" multiple class="form-control">
                  </div>
              </div> --}}
                <button type="submit" class="btn btn-primary">Add Product</button>
              </form>
        </div>
    </div>
</div>

@endsection