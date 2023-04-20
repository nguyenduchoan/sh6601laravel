<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function detail($id)
    {
        $cats = DB::table('categories')
            ->where('status', '=', 1)
            ->get();
        $product = Product::find($id);
        $category = Category::where('id', $product->category_id)->get();
        $images = Image::where('product_id', $id)->get();
        $comments = Comment::where('product_id', $id)->get();
        $totalReviewOfProduct = $comments->count();
        $avgStar = 0;
        if ($totalReviewOfProduct !== 0){
            $avgStar = (Comment::where('product_id', $id)->sum('star'))/$totalReviewOfProduct;
        }
        $users = User::all();
        return view('product-detail', compact('cats','product', 'category', 'images', 'comments', 'totalReviewOfProduct', 'avgStar', 'users'));
    }
}
