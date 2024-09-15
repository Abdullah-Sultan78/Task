@extends('backend.master')
@section('title','View Product')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h2 class="text-center m-3">Manage Product</h2>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SI</th>
                        <th scope="col">Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        {{-- <td>{{$product->name}}</td> --}}
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->description}}</td>
                        <td><img src="{{ asset($product->image) }}" alt="" height="50" width="50"></td>
                        
                        <td>
                          <div class="d-flex gap-2 ">

                            <a href="{{route('products.edit',$product->id) }}" class="btn btn-sm btn-outline-primary">EDIT</a>
                            <form action="{{route('products.destroy',$product->id)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                              </form>
                            </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection