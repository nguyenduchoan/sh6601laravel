<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //Áp dụng middleware để xác thực tài khoản đăng nhập
    //Sử dụng cho controller.
    // Đối với cách này thì tất cả các action trong controller đó được xác thực
    // đăng nhập trước khi truy cập
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        return view('home');
    }
}
