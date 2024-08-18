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

<form method="POST" action="{{route('movies.store')}}">
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
            <label  class="form-label">Geners</label>
            <input type="text" name="gener" class="form-control" value="{{old('gener')}}"></input>
        </div>


        <button class="btn btn-success">+ADD</button>
    </form>
@endsection