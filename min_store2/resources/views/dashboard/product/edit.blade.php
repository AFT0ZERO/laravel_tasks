@extends('dashboard.layouts.master')



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


    <form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{$user->product_name}}" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3">{{$user->product_description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input name="price" type="text" class="form-control" value="{{$user->product_price}}" >
        </div>

        <div class="mb-3">
            <label  class="form-label">Product Category</label>
            <select name="category" class="form-control">
                @foreach ($categories as $category )
                    <option  @if($category->id == $user->category_id) selected @endif value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label  class="form-label">upload Image</label>
            <input type="file" name="image" class="form-control" value="{{$user->image}}" >
        </div>

        <button class="btn btn-primary">update</button>
    </form>
@endsection
