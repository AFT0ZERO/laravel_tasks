@extends('layouts.app')

@section('title', 'index')


@section("content")

<div class="text-center">
    <a href="{{route('product.create')}}" class="btn btn-success">Add Product</a>
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
        @foreach($prodacts as $prodact)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$prodact->product_name}}</td>
                <td>{{$prodact->product_price}}</td>
                <td>{{$prodact->category->category_name}}</td>
                 <td>{{$prodact->created_at->format('y-m-d')}}</td>
                <td>
                    <a href="{{route("product.show", $prodact->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('product.edit', $prodact->id)}}" class="btn btn-primary">Edit</a>

                    <form style="display:inline;" method="post" action="{{route('product.destroy', $prodact->id)}}">
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