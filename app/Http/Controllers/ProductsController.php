<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(Product $product)
    {


        return view('products.show', compact('product'));
    }
    public function index (Product $product)
    {
        $products=Product::with('category')->paginate(6);
        return view('products.index', compact('products'));
    }
}
