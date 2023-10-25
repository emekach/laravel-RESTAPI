<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        if (!$products) {
            return response()->json([
                'error' => 'No products available'
            ]);
        }

        return response()->json(['products' => $products]);
    } // End Method


    public function show(int $id)
    {
        $products = Product::find($id);

        if (!$products) {
            return response()->json([
                'error' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'products' => $products
        ], 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'qty' => 'required|max:191'
        ]);

        // $data= $request->validated();

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();

        return response()->json([
            'message' => 'Product Added successfully',
        ], 200);
    } //End Method

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'qty' => 'required|max:191'
        ]);

        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'error' => 'No Product with id found'
            ], 404);
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->update();

        return response()->json([
            'message' => 'Products Updated Successfully'
        ], 200);
    }
}
