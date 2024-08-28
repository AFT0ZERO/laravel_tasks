@extends('dashboard.layouts.master')

@section("content")



    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->subject}}</td>
                <td>{{$contact->created_at->format('y-m-d')}}</td>

                <td>
                    <a href="{{route("contact.show", $contact->id)}}" class="btn btn-info">View</a>


                    <form style="display:inline;" method="post" action="{{route('contact.destroy', $contact->id)}}">
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
