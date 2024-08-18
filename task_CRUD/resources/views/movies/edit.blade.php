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


<form method="post" action="{{route('movies.update',$movie->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{$movie->movie_name}}" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3">{{$movie->movie_description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Geners</label>
            <input name="gener" type="text" class="form-control" value="{{$movie->movie_gener}}" >
        </div>

       

        <button class="btn btn-primary">update</button>
    </form>
@endsection