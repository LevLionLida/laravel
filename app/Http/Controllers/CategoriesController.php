<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function show (Category $category)
    {

       $products=Product::where('category_id', $category->id)->get();
//        $products = $category->products()->get();
        return view('categories.show', compact('category','products'));
    }

    public function index (Category $category)
    {
       //$categories = Category::all();
        $categories = Category::withCount('products')->paginate(5);

       return view('categories.index', compact('categories'));
    }
}
