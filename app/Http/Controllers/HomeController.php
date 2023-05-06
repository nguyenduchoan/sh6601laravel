<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //check login for Route home.index
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->limit(4)->get();
        return view('index', compact('products'));
    }

    public function product($id)
    {
        // Use the ID parameter to find the product in the database
        $product = Product::findOrFail($id);

        // Pass the product data to the view
        return view('product-detail', compact('product'));
    }
}
