@extends('layouts.app')

@section('title','show')
@section("content")
    <div class="card mt-4">
        <div class="card-header">
        Category Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Category Name: {{$category->category_name}}</h5>
            <p class="card-text">Category Description: {{$category->category_description}}</p>
            <p class="card-text"><b>Category Created At: {{$category->created_at}}</b></p>
        </div>
    </div>

    
@endsection