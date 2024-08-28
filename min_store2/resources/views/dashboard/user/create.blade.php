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

    <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{old('name')}}" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Email</label>
            <input type="email" name="email" class="form-control"  value="{{old('email')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="text" class="form-control" value="{{old('password')}}" >
        </div>


        <button class="btn btn-success">ADD +</button>
    </form>
@endsection
