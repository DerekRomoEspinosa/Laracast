<?php

use Illuminate\Support\Facades\Route;
use App\Models\service;



    Route::get('/', function () {
    return view('home');
});


Route::get('/services', function ()  {
    return view('services', [
        'services' => service::all()
    ]);
});


Route::get('/services/{id}', function ($id) {
    $service = service::find($id);

         return view('service', ['service' => $service]);
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


