<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prodact;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $ProductFromDB = Product::all();
        return view("dashboard.product.index", ["products" => $ProductFromDB]);
    }

    public function create()
    {
        $Categories=Category::all();
        return view('dashboard.product.create',['categories'=>$Categories]);
    }

    public function store(Request $request)
    {
        request()->validate(
            [
                'name'=>['required','min:3'],
                'description'=>['required','min:5'],
                'price'=>['required','min:1'],
                'image'=>['nullable','image','mimes:jpeg,png,jpg'],
                'category'=>['required','exists:categories,id']
            ]
        );

        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $path='uploads/product/';
            $file->move($path, $fileName);
        }

        $title = request()->name;
        $description = request()->description;
        $price = request()->price;
        $category = request()->category;

        //2- store the user data in database
        Product::create([
            'product_name'=>$title,
            'product_description'=>$description,
            'product_price'=>$price,
            'image'=>$path.$fileName,
            'category_id'=>$category
        ]);
        // !must make fillable in model Post


        return to_route('product.index');
    }

    public function show(Product $product)
    {
        return view("dashboard.product.show", ["product" => $product]);
    }

    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('dashboard.product.edit', ['categories' => $categories, 'product'=>$product]);
    }

    public function update(Request $request, Product $product)
    {
        request()->validate(
            [
                'name'=>['required','min:3'],
                'description'=>['required','min:5'],
                'price'=>['required','min:1'],
                'image'=>['nullable','image','mimes:jpeg,png,jpg'],
                'category'=>['required','exists:categories,id']
            ]
        );
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $path='uploads/product/';
            $file->move($path, $fileName);
        }
        $title = request()->name;
        $description = request()->description;
        $price = request()->price;
        $category = request()->category;

        $product->update(
            [
                'product_name'=>$title,
                'product_description'=>$description,
                'product_price'=>$price,
                'image'=>$path.$fileName,
                'category_id'=>$category
            ]
        );


        //3- redirection to posts.show
        return to_route('product.show', $product->id);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('product.index');
    }
}
