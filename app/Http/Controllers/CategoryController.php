<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = DB::table('categories')->paginate(2);
        return view('category.index', compact('cats'));
    }

    /**
     * Phương thức create hiển thị form nhập dữ liệu
     */
    public function create()
    {
        return view('category.create');
    }
    /**
     * Phương thức store để nhận và lưu dữ liệu vào bảng
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories'
        ];

        $messages = [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng',
        ];

        $request->validate($rules, $messages);

        DB::table('categories')->insert($request->only('name', 'status'));
        return redirect()->route('category.index'); // chuyển hướng về danh sách
    }

    public function delete($id)
    {
        DB::table('categories')->where('id', $id)->delete(); // return true, false
        return redirect()->route('category.index'); // chuyển hướng về danh sách
    }

    /** phương thức edit hiển thị dữ liệu trên form theo id */
    public function edit($id)
    {
        /** SELECT * FROM categories WHERE id = $id */
        $cat = DB::table('categories')->find($id);
        /** Gửi dữ liệu qua form edit.blade.php*/
        return view('category.edit', compact('cat'));
    }
    /** Phương thức update để nhận và lưu dữ liệu vào bảng */
    public function update($id, Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories'
        ];
        $messages = [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng',
        ];
        $request->validate($rules, $messages);
        DB::table('categories')->where('id', $id)->update($request->only('name', 'status'));
        return redirect()->route('category.index'); // chuyển hướng về danh sách
    }
}
