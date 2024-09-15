@extends('backend.master')
@section('title', 'Edit')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h3 class="text-center m-3">Edit Category</h3>
                @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
