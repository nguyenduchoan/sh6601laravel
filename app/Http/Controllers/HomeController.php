<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->limit(4)->get();
        $cates = DB::table('Categories')->select('*')->get();
        // dd($cates);
        return view('customer.index', compact('products', 'cates'));
    }
    public function product(Product $product)
    {
        return view('customer.product-detail', compact('product'));
    }

    public function login()
    {
        // Hiển thị form login
        return view('login');
    }
    public function check_login(Request $req)
    {
        // Khai báo các quy ràng buộc xác thực
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        // customize các tin nhắn
        $message = [
            'email.required' => 'Địa chỉ email không được để trống',
            'email.email' => 'Địa chỉ email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống'
        ];
        // nếu Các ràng buộc đã hợp lệ, thì xử lý tiếp
        $req->validate($rules, $message);
    }


    public function productComment(Request $req)
    {
        $req->validate([
            'content' => 'required|min:10|max:500'
        ], [
            'content.required' => 'Nội dung bình luận không được để trống',
            'content.min' => 'Nội dung bình luận tối thiểu là 10 ký tự',
            'content.required' => 'Nội dung bình luận tối đa là 500 ký tự'
        ]);
        Comment::create([
            'customer_id' => auth()->guard('cus')->id(),
            'product_id' => $req->product_id,
            'content' => $req->content
        ]);
        return redirect()->back()->with('ok', 'Bình luận thành công');
    }
    public function deleteComment(Comment $comment)
    {
        if (auth('cus')->check() && auth('cus')->user()->can('change-comment', $comment)) {
            // thực hiện xóa
            $comment->delete();
            return redirect()->back()->with('ok', 'Xóa bình luận thành công');
        }
        return abort(403); // trả về 403 không có quyền
    }
}
