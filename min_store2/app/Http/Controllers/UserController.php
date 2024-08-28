<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $UsersFromDB = User::all();
        return view("dashboard.user.index", ["users" => $UsersFromDB]);
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        request()->validate(
            [
                'name'=>['required','min:3'],
                'email'=>['required','email'],
                'password'=>['required','min:5']
            ]
        );

        $name = request()->name;
        $email = request()->email;
        $password = request()->password;


        User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
        ]);


        return to_route('user.index');
    }

    public function show(User $user)
    {
        return view("dashboard.user.show", ["user" => $user]);
    }

    public function edit(User $user)
    {
        return view('dashboard.user.edit', ['user' => $user]);
    }

    public function update(Request $request,User $user)
    {
        request()->validate(
            [
                'name'=>['required','min:3'],
                'email'=>['required','email'],
            ]
        );

        $name = request()->name;
        $email = request()->email;


        $user->update(
            [
                'name'=>$name,
                'email'=>$email,
            ]
        );


        //3- redirection to posts.show
        return to_route('user.show', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('user.index');
    }
}
