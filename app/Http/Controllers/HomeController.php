<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }//check to auth

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories=Category::all();
        $products = Product::all()->where('in_stock', '>', 0)->take(6);
        notify()->success("Welcome ", "Title","bottomRight" );
        return view('home', compact('products', 'categories'));
    }
}
