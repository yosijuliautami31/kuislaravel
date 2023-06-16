<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');
        $product->save();
        $products = Product::all();
        return view('products.index', compact('products'))
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    // public function show()
    {
        $product = Product::findOrFail($product->id);
        return view('products.details', compact('product'));
        // return view('product.details');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::findOrFail($product->id);
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');
        $product->save();
        return view('products.details', compact('product'))
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function available()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('products.index', compact('products'));
    }
    public function unavailable()
    {
        $products = Product::where('stock', 0)->get();
        return view('products.index', compact('products'));
    }
    public function stock(Request $request, Product $product)
    {
        $product = Product::findOrFail($product->id);
        if ($request->input('stock') >= 0) {
            $product->stock = $request->input('stock');
        }
        $product->save();
        return redirect()->route('products.show', $product)
            ->with('success', 'Product updated successfully.');
    }
}
