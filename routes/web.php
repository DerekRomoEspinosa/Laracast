<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\service;


    Route::get('/', function () {
    return view('home');
});


//Muestra todos los servicio
Route::get('/products', function ()  {
    $products = Product::with('developer')->simplePaginate(5);

    return view('products.index', [
        'products' => $products
    ]);
});

Route::get('/products/create', function () {
    return view('products.create');
});


//Muestra un solo trabajo
Route::get('/products/{id}', function ($id) {
    $product = Product::find($id);

         return view('products.show', ['product' => $product]);
});





Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});


