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
        $products = Product::all();
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
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048'
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            Product::create([
                'name' => $request->name,
                'product_id' => $request->product_id,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $imageName,
            ]);
        }else{
            Product::create([
                'name' => $request->name,
                'product_id' => $request->product_id,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        }

        return redirect()->route('products.index')->withSuccess('Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048'
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->update([
                'name' => $request->name,
                'product_id' => $request->product_id,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $imageName,
            ]);
        }else{
            $product->update([
                'name' => $request->name,
                'product_id' => $request->product_id,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        }
        return redirect()->route('products.index')->withSuccess('Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->withSuccess('Product deleted successfully');
    }
}
