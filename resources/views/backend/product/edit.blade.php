@extends('backend.master')
@section('title', 'Edit Product')
@section('content')
    <div class="container-fluid px-4 py-4">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h3 class="text-center m-3">Edit Product</h3>

                @if (Session::get('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{(Session::get('msg'))}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">...{{$product->category->name}}...</option>
                            {{-- <option value="">....Select Category....</option> --}}
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger">{{ $message }} </span>
                       @enderror
                    </div>
                   
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$product->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="{{$product->description }}">
                    </div>
                    <div class="mb-3">
                        <img src="{{asset($product->image)}}" alt="" height="50" width="50">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        {{-- @error('image')
                            <span class="text-danger">{{ $message }} </span>
                        @enderror --}}
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
