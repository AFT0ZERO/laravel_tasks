@extends('dashboard.layouts.master')

@section("content")

    <div class="text-center">
        <a href="{{route('user.create')}}" class="btn btn-success">Add Product</a>
    </div>


    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Added At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="{{asset($user->image)}}" alt="user image"  style="width: 50px ;height: 50px">
                </td>
                <td>{{$user->product_name}}</td>

                <td>{{$user->product_price}}</td>
                <td>{{$user->category->category_name}}</td>
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
