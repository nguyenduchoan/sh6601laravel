<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $req)
    {
        // dd($req);
        $limit = 3; //tùy chọn, số dòng/ trang
        $page = $req->page > 0 ? $req->page : 1; // trang hiện tại đang truy cập
        $offset = ($page - 1) * $limit; //  số dòng bị loại bỏ

        //Truy vấn cơ bản
        $query = DB::table('products')
            ->select('products.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'products.category_id');
        // nếu có yêu cầu sắp xếp thì sắp xếp theo order
        if ($req->order) {
            $order = explode('-', $req->order); // chuyển về mảng ['name','ASC']
            $query = $query->orderBy($order[0], $order[1]);
        }
        $totalRow = DB::table('products')->count('id');
        if ($req->name) {
            dd("tim kiem theo ten");
            // nếu có thông tin name được gửi lên, tìm kiếm với LIKE
            $query = $query->where('products.name', 'LIKE', '%' . $req->name . '%');
            // Tính lại totalRow
            $totalRow = DB::table('products')->where('products.name', 'LIKE', '%' . $req->name . '%')->count('id');
        }


        $products = $query->limit($limit)->offset($offset)->get(); // danh sách dữ liệu sản phẩm


        // $totalRow = DB::table('products')->count('id');
        $totalPrice = DB::table('products')->sum('price');
        $maxPrice = DB::table('products')->max('price');
        $minPrice = DB::table('products')->min('price');
        $totlPage = ceil($totalRow / $limit);
        // trả dữ liệu về cho views/product.blade.php
        return view('product', compact('products', 'totalRow', 'totalPrice', 'maxPrice', 'minPrice', 'totlPage'));
    }

    public function indexJoin(Request $req)
    {
        $products = Product::paginate(2);
        dd($products);
        return view('product.product-join', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    /**
     * Phương thức store để nhận và lưu dữ liệu vào bảng
     */
    public function store(Request $request)
    {
        $rules = ['upload' => 'required|mimes:jpg,jpeg,png,gif'];
        $mesages = [
            'upload.required' => 'Vui lòng chọn một file',
            'upload.mimes' => 'Định dạng file cho phép là: jpg, png, gif',
        ];

        $request->validate($rules, $mesages);

        $file_name = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'), $file_name);
        $path = "/uploads/" . $file_name;
        $data = $request->only('name', 'price', 'sale_price', 'content', 'category_id', 'status');
        $data["image"] = $path;
        // dd($data);
        DB::table('products')->insert($data);
        return redirect()->route('product.index'); // chuyển hướng về danh sách
    }
}
