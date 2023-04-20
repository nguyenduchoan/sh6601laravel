<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function listAll(Request $request)
    {
        $cats = DB::table('categories')
            ->where('status', '=', 1)
            ->get();
        $product = DB::table('products')->paginate(8);
        $products = $product->items();
        $totalPage = $product->lastPage();
        $currentPage = $product->currentPage();
        return view('index', compact('cats', 'products', 'totalPage', 'currentPage'));
    }

    public function listById($id)
    {
        $cats = DB::table('categories')
            ->where('status', '=', 1)
            ->get();
        $categoryById = Category::find($id);
        $product = DB::table('products')->where('category_id', $id)->paginate(8);
        $totalPage = $product->lastPage();
        $products = $product->items();
        $currentPage = $product->currentPage();
        return view('index', compact('cats', 'categoryById', 'products', 'totalPage', 'currentPage'));
    }
}