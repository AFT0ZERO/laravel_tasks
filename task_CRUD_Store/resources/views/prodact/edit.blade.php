@extends('layouts.app')

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


<form method="post" action="{{route('product.update',$product->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{$product->product_name}}" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3">{{$product->product_description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input name="price" type="text" class="form-control" value="{{$product->product_price}}" >
        </div>

        <div class="mb-3">
            <label  class="form-label">Product Category</label>
            <select name="category" class="form-control">
                @foreach ($categorys as $category )
                <option  @if($category->id == $product->category_id) selected @endif value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">update</button>
    </form>
@endsection