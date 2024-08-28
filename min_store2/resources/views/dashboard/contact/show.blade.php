@extends('dashboard.layouts.master')


@section("content")
    <div class="card mt-4">
        <div class="card-header">
            Contact Info
        </div>
        <div class="card-body">
            <h5 class="card-title"> Name: {{$contact->name}}</h5>
            <p class="card-text"><b> Email: {{$contact->email}} </b></p>
            <p class="card-text"><b>Subject Title : {{$contact->subject}} </b></p>
            <p class="card-text"><b>Message : {{$contact->message}} </b></p>
            <p class="card-text"><b>Created At : {{$contact->created_at}} </b></p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            User Info
        </div>
        <div class="card-body">
            <h5 class="card-title">User Name : {{$contact->user->name}}</h5>
            <p class="card-text">User Email: {{$contact->user->email}}</p>
            <p class="card-text">User ID: {{$contact->user->id}}</p>
            <p class="card-text">Created At: {{$contact->user->created_at}}</p>
        </div>
    </div>
@endsection
