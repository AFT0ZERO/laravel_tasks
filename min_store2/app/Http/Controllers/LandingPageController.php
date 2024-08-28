<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('home2',['products'=>$products,'categories'=>$categories]);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        request()->validate(
            [
                'name'=>['required','min:3'],
                'email'=>['required','email'],
                'subject'=>['required','min:5'],
                'message'=>['required','min:10'],
            ]
        );



        $name = request()->name;
        $email = request()->email;
        $subject = request()->subject;
        $message = request()->message;
        $user = request()->user_id;
        //2- store the user data in database
        Contact::create([
            'name'=>$name,
            'email'=>$email,
            'subject'=>$subject,
            'message'=>$message,
            'user_id'=>$user
        ]);
        // !must make fillable in model Post


        return to_route('landing.page');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
