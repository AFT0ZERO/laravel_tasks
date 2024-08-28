@extends('dashboard.layouts.master')

{{--@section('title','create')--}}

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

    <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
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
            <label  class="form-label">upload image</label>
            <input type="file" name="image" class="form-control" value="{{old('image')}}" >
        </div>
        <button class="btn btn-success">ADD +</button>
    </form>
@endsection
