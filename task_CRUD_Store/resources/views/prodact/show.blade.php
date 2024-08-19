@extends('layouts.app')

@section('title','show')
@section("content")
    <div class="card mt-4">
        <div class="card-header">
            Product Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Product Name: {{$prodact->product_name}}</h5>
            <p class="card-text">Product Description: {{$prodact->product_description}}</p>
            <p class="card-text"><b>Product Price: {{$prodact->product_price}} $</b></p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Category Info
        </div>
        <div class="card-body">
           
            <h5 class="card-title">Category Name : {{$prodact->category->category_name}}</h5>
            <p class="card-text">Description: {{$prodact->category->category_description}}</p>
            <p class="card-text">Created At: {{$prodact->category->created_at}}</p>
        </div>
    </div>
@endsection