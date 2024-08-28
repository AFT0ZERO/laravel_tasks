@extends('dashboard.layouts.master')

@section('title','edit')

@section("content")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="post" action="{{route('category.update',$categorys->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{$categorys->category_name}}" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3">{{$categorys->category_description}}</textarea>
        </div>

        <div class="mb-3">
            <label  class="form-label">upload Image</label>
            <input type="file" name="image" class="form-control" value="{{$categorys->image}}" >
        </div>



        <button class="btn btn-primary">update</button>
    </form>
@endsection
