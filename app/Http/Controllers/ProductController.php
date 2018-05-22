<?php

namespace App\Http\Controllers;

use App\Product;
use Faker\Provider\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function show($id)
    {
        return response()->json(Product::findOrFail($id));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->except('image'));
        if ($request->file('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('products/'), $filename);
            $product->image = $filename;
            $product->save();
        }

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->except('image'));
        if ($request->file('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('products/'), $filename);
            $product->image = $filename;
            $product->save();
        }

        return response()->json($product);
    }

    public function delete(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }
}
