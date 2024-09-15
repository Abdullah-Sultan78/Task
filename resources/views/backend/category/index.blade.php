@extends('backend.master')
@section('title','View Category')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h2 class="text-center m-3">View Category</h2>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SI</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                          <div class="d-flex gap-2">
                            <a href="{{route('categories.edit',$category->id)}}"
                               class="btn btn-sm btn-outline-success">EDIT</a>
                               <form action="{{route('categories.destroy',$category->id)}}" method="POST">
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