@extends('layouts.app')
@section('title', 'index')

@section('content')
<div class="text-center">
    <a href="{{route('movies.create')}}" class="btn btn-success">Create Post</a>
</div>


<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">movie genres</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($movies as $movie)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$movie->movie_name}}</td>
                <td>{{$movie->movie_gener}}</td>
                <td>{{$movie->created_at}}</td>
                <td>
                    <a href="{{route('movies.show', $movie->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('movies.edit', $movie->id)}}" class="btn btn-primary">Edit</a>
                    
                        <!-- Delete Form Start -->
                        <form style="display:inline;" method="post" action="{{route('movies.destroy', $movie->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <!-- Delete Form End -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection