@extends('dashboard.layouts.master')


@section("content")
    <div class="card mt-4">
        <div class="card-header">
            User Info
        </div>
        <div class="card-body">
            <h5 class="card-title">User Name: {{$user->name}}</h5>
            <p class="card-text">User Email: {{$user->email}}</p>
            <p class="card-text"><b>Created At : {{$user->created_at}} $</b></p>
        </div>
    </div>

@endsection
