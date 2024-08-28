@extends('dashboard.layouts.master')

@section("content")

    <div class="text-center">
        <a href="{{route('user.create')}}" class="btn btn-success">Add User</a>
    </div>


    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>

                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->format('y-m-d')}}</td>

                <td>
                    <a href="{{route("user.show", $user->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary">Edit</a>

                    <form style="display:inline;" method="post" action="{{route('user.destroy', $user->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach


        </tbody>
    </table>

    </div>
@endsection
