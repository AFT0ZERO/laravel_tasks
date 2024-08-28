<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ContactController;
use \App\Http\Controllers\LandingPageController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index',[LandingPageController::class,'index'])->name('landing.page');

Route::post('/index', [LandingPageController::class , "store"])->name("landing.store");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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



// ^----------------------------------user route start-----------------------------------------
Route::get('/users', [UserController::class , "index"])->name("user.index");

Route::get('/users/create', [UserController::class , "create"])->name("user.create");
Route::post('/users', [UserController::class , "store"])->name("user.store");

Route::PUT('/users/{user}', [UserController::class , "update"])->name("user.update");
Route::get('/users/{user}/edit' ,[UserController::class , 'edit'])->name('user.edit');

Route::get('/users/{user}', [UserController::class , "show"])->name("user.show");

Route::delete('/users/{user}', [UserController::class , "destroy"])->name("user.destroy");
//^ ----------------------------------user route start-----------------------------------------


// ^----------------------------------contact route start-----------------------------------------
Route::get('/contacts', [ContactController::class , "index"])->name("contact.index");

Route::get('/contacts/{contact}', [ContactController::class , "show"])->name("contact.show");

Route::delete('/contacts/{contact}', [ContactController::class , "destroy"])->name("contact.destroy");
//^ ----------------------------------contact route start-----------------------------------------

