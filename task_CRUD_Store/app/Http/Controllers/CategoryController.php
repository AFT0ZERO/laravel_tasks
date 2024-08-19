<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Prodact;
class CategoryController extends Controller
{
    public function index()
    {
        $CategoryFromDB = Category::all();
        // @dd($ProdactFromDB);
        return view("category.index", ["categorys" => $CategoryFromDB]);
    }

    public function show(Category $category)
    {
        return view("category.show", ["category" => $category]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store()
    {
    
        request()->validate(
            [
                'name'=>['required','min:3'],
                'description'=>['required','min:5'],
                
            ]
        );

        $name = request()->name;
        $description = request()->description;
      

        //2- store the user data in database
        Category::create([
            'category_name'=>$name,
            'category_description'=>$description
        ]);
        // !must make fillable in model Post
   
        
        return to_route('category.index');
    }

    public function edit(Category $category)
    {
       
        return view('category.edit', ['categorys' => $category]);
    }

    public function update(Category $category)
    {
        // @dd($postId);
        request()->validate(
            [
                'name'=>['required','min:3'],
                'description'=>['required','min:5'],
               
            ]
        );

        $name = request()->name;
        $description = request()->description;
       
        $category->update(
            [
                'category_name'=>$name,
                'category_description'=>$description,
            ]
            );


        //3- redirection to posts.show
        return to_route('category.show', $category->id);
    }

    public function destroy(Category $category  )
    {
        $category->delete();
        return to_route('category.index');
    }
}
