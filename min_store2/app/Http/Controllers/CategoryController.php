<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $CategoryFromDB = Category::all();
        return view("dashboard.category.index", ["categories" => $CategoryFromDB]);
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(Request $request)
    {
        request()->validate(
            [
                'name'=>['required','min:3'],
                'description'=>['required','min:5'],
                'image'=>['nullable','image','mimes:jpeg,png,jpg']
            ]
        );

        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $path='uploads/category/';
            $file->move($path, $fileName);
        }

        $name = request()->name;
        $description = request()->description;


        //2- store the user data in database
        Category::create([
            'category_name'=>$name,
            'category_description'=>$description,
            'image'=>$path.$fileName,
        ]);
        // !must make fillable in model Post


        return to_route('category.index');
    }

    public function show(Category $category)
    {
        return view("dashboard.category.show", ["category" => $category]);
    }

    public function edit(Category $category)
    {
        return view('dashboard.category.edit', ['categorys' => $category]);
    }

    public function update(Request $request, Category $category)
    {

        request()->validate(
            [
                'name'=>['required','min:3'],
                'description'=>['required','min:5'],
                'image'=>['nullable','image','mimes:jpeg,png,jpg']


            ]
        );

        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $path='uploads/category/';
            $file->move($path, $fileName);
        }

        $name = request()->name;
        $description = request()->description;

        $category->update(
            [
                'category_name'=>$name,
                'category_description'=>$description,
                'image'=>$path.$fileName
            ]
        );


        //3- redirection to posts.show
        return to_route('category.show', $category->id);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index');
    }
}
