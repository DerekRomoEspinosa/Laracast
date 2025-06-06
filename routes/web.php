<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\service;

Route::get('/', function () {
    return view('home');
});

// Index de productos
Route::get('/products', function () {
    $products = Product::with('brand')->latest()->paginate(6);

    return view('products.index', [
        'products' => $products
    ]);
})->name('products.index');

// Crear nuevo producto
Route::get('/products/create', function () {
    return view('products.create');
})->name('products.create');

// Guardar nuevo producto
Route::post('/products', function () {
    // Validación
    request()->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'brand_id' => 'required|exists:brands,id',
        'stock' => 'required|integer|min:0'
    ]);

    Product::create([
        'title' => request('title'),
        'description' => request('description'),
        'price' => request('price'),
        'stock' => request('stock'),
        'brand_id' => request('brand_id')
    ]);

    return redirect('/products')->with('success', 'Producto creado correctamente!');
})->name('products.store');

// Mostrar un solo producto
Route::get('/products/{id}', function ($id) {
    $product = Product::findOrFail($id);

    return view('products.show', ['product' => $product]);
})->name('products.show');

// Editar producto
Route::get('/products/{id}/edit', function ($id) {
    $product = Product::findOrFail($id);

    return view('products.edit', ['product' => $product]);
})->name('products.edit');

// Actualizar producto
Route::put('/products/{id}', function ($id) {
    // Validación
    request()->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'brand_id' => 'required|exists:brands,id',
        'stock' => 'required|integer|min:0'
    ]);

    $product = Product::findOrFail($id);
    $product->update([
        'title' => request('title'),
        'description' => request('description'),
        'price' => request('price'),
        'stock' => request('stock'),
        'brand_id' => request('brand_id')
    ]);

    return redirect('/products')->with('success', 'Producto actualizado correctamente!');
})->name('products.update');

// Eliminar producto
Route::delete('/products/{id}', function ($id) {
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect('/products')->with('success', 'Producto eliminado correctamente!');
})->name('products.destroy');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
