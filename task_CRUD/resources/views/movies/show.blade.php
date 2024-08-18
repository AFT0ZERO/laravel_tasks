@extends('layouts.app')

@section('title','show')
@section("content")
    <div class="card mt-4">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
         
            <h5 class="card-title">Name: {{$movie->movie_name}}</h5>
            <p class="card-text">Description: {{$movie->movie_description}}</p>
            <p class="card-text">Gener: {{$movie->movie_gener}}</p>
            <p class="card-text">Created At: {{$movie->created_at}}</p>
        </div>
    </div>

@endsection