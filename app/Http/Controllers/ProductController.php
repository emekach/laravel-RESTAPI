<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
    }
}
