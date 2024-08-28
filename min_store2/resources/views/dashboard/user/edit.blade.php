@extends('dashboard.layouts.master')

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


    <form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{$user->name}}" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{$user->email}}" >
        </div>

        <button class="btn btn-primary">update</button>
    </form>
@endsection
