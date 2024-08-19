<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// ^----------------------------------product route start-----------------------------------------
Route::get('/products', [ProductController::class , "index"])->name("product.index");

Route::get('/products/create', [ProductController::class , "create"])->name("product.create");
Route::post('/products', [ProductController::class , "store"])->name("product.store");

Route::PUT('/products/{product}', [ProductController::class , "update"])->name("product.update");
Route::get('/products/{product}/edit' ,[ProductController::class , 'edit'])->name('product.edit');

Route::get('/products/{product}', [ProductController::class , "show"])->name("product.show");

Route::delete('/products/{product}', [ProductController::class , "destroy"])->name("product.destroy");
//^ ----------------------------------product route start-----------------------------------------




//^ ----------------------------------category route start-----------------------------------------
Route::get('/categories', [CategoryController::class , "index"])->name("category.index");

Route::get('/categories/create', [CategoryController::class , "create"])->name("category.create");

Route::post('/categories', [CategoryController::class , "store"])->name("category.store");

Route::PUT('/categories/{category}', [CategoryController::class , "update"])->name("category.update");

Route::get('/categories/{category}/edit' ,[CategoryController::class , 'edit'])->name('category.edit');

Route::get('/categories/{category}', [CategoryController::class , "show"])->name("category.show");

Route::delete('/categories/{category}', [CategoryController::class , "destroy"])->name("category.destroy");
//^ ----------------------------------category route start-----------------------------------------
