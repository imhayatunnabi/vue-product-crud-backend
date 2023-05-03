<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return $this->sendJson('Product list loaded', $products, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
        ]);
        $product = Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
        ]);
        return $this->sendJson('Product created successfully', $product, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return $this->sendJson('Single product loaded', $product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->update([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
        ]);
        return $this->sendJson('Product updated success', $product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return $this->sendJson('Product deleted successfully', $product, 200);
    }
}
