@extends('dashboard.layouts.master')

@section('content')

    <div class="text-center">
        <a href="{{route('category.create')}}" class="btn btn-success">Add Category</a>
    </div>


    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <!-- <th scope="col">Number Of Products</th> -->
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)

            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->category_name}}</td>
                <td >
                    <img src="{{$category->image}}" alt="category image" style="width: 50px ;height: 50px">
                </td>
                <!-- number of user -->
                <td>{{$category->created_at->format('y-m-d')}}</td>
                <td>
                    <a href="{{route("category.show", $category->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary">Edit</a>

                    <form style="display:inline;" method="post" action="{{route('category.destroy', $category->id)}}">
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
