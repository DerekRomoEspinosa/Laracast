<?php

use Illuminate\Support\Facades\Route;
use App\Models\service;


    Route::get('/', function () {
    return view('home');
});


//Muestra todos los servicio
Route::get('/services', function ()  {
    $services = service::with('developer')->simplePaginate(5);

    return view('services.index', [
        'services' => $services
    ]);
});

Route::get('/services/create', function () {
    return view('services.create');
});


//Muestra un solo trabajo
Route::get('/services/{id}', function ($id) {
    $service = service::find($id);

         return view('services.show', ['service' => $service]);
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


