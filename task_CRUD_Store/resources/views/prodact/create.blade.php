@extends('layouts.app')

@section('title','create')

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

<form method="POST" action="{{route('product.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{old('name')}}" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3">{{old('description')}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input name="price" type="text" class="form-control" value="{{old('price')}}" >
        </div>

        <div class="mb-3">
            <label  class="form-label">Category</label>
            <select name="category" class="form-control">
                @foreach ($categorys as $category )
                <option value={{$category->id}}>{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">ADD +</button>
    </form>
@endsection