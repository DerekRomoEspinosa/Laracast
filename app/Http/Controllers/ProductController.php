<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->latest()->paginate(6);

        return view('products.index', [
            'products' => $products
        ]);
    }


    public function create()
    {
        return view('products.create');
    }


    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }


    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|exists:brands,id',
            'stock' => 'required|integer|min:5'
        ]);

        Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'brand_id' => $request->input('brand_id')
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        // Validación
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|exists:brands,id',
            'stock' => 'required|integer|min:5'
        ]);

        $product->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'brand_id' => $request->input('brand_id')
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }


}
