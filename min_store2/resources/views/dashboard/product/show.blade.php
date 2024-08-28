@extends('dashboard.layouts.master')


@section("content")
    <div class="card mt-4">
        <div class="card-header">
            Product Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Product Name: {{$user->product_name}}</h5>
            <p class="card-text">
                <img src="{{asset($user->image)}}" alt="user image" style="width: 150px ;height: 150px">
            </p>
            <p class="card-text">Product Description: {{$user->product_description}}</p>
            <p class="card-text"><b>Product Price: {{$user->product_price}} $</b></p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Category Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Category Name : {{$user->category->category_name}}</h5>
            <p class="card-text">
                <img src="{{asset($user->category->image)}}" alt="category image " style="width: 150px ;height: 150px">
            </p>
            <p class="card-text">Description: {{$user->category->category_description}}</p>
            <p class="card-text">Created At: {{$user->category->created_at}}</p>
        </div>
    </div>
@endsection
