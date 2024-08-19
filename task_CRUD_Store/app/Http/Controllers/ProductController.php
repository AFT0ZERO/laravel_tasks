<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prodact;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $ProdactFromDB = Prodact::all();
        // @dd($ProdactFromDB);
        return view("prodact.index", ["prodacts" => $ProdactFromDB]);
    }

    public function show(Prodact $product)
    {
        return view("prodact.show", ["prodact" => $product]);
    }

    public function create()
    {
        $Categorys=Category::all();
        return view('prodact.create',['categorys'=>$Categorys]);
    }

    public function store()
    {
    
        request()->validate(
            [
                'name'=>['required','min:3'],
                'description'=>['required','min:5'],
                'price'=>['required','min:1'],
                'category'=>['required','exists:categories,id']
            ]
        );

        $title = request()->name;
        $description = request()->description;
        $price = request()->price;
        $category = request()->category;

        //2- store the user data in database
        Prodact::create([
            'product_name'=>$title,
            'product_description'=>$description,
            'product_price'=>$price,
            'category_id'=>$category
        ]);
        // !must make fillable in model Post
   
        
        return to_route('product.index');
    }

    public function edit(Prodact $product)
    {
        $categorys=Category::all();
        return view('prodact.edit', ['categorys' => $categorys, 'product'=>$product]);
    }

    public function update(Prodact $product)
    {
        // @dd($postId);
        request()->validate(
            [
                'name'=>['required','min:3'],
                'description'=>['required','min:5'],
                'price'=>['required','min:1'],
                'category'=>['required','exists:categories,id']
            ]
        );

        $title = request()->name;
        $description = request()->description;
        $price = request()->price;
        $category = request()->category;

        $product->update(
            [
                'product_name'=>$title,
                'product_description'=>$description,
                'product_price'=>$price,
                'category_id'=>$category
            ]
            );


        //3- redirection to posts.show
        return to_route('product.show', $product->id);
    }

    public function destroy(Prodact $product  )
    {
        $product->delete();
        return to_route('product.index');
    }
}
