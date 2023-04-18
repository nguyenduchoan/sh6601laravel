<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function login()
    {
        // gọi view hiện hị form đăng nhập
        return view('customer.login');
    }
    public function post_login(Request $request)
    {
        // code thực hiện đăng nhập
        //$login_data = $request->only('email','password');


        $login_data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $check_login = Auth::guard('cus')->attempt($login_data);
        if (!$check_login) {
            return redirect()->back()->with('error', 'Đăng nhập không thành công vui lòng thử lại');
        }
        return redirect()->route('home.index')/*back()*/;
    }
    public function register()
    {
        // gọi view hiện hị form đăng ký
        return view('customer.register');
    }
    public function post_register(Request $request)
    {
        // code thực hiện đăng ký
        // validae dữ liệu trên form
        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|unique:customers|max:100',
            'phone' => 'required|max:10',
            'address' => 'required|max:200',
            'password' => 'required|min:6|max:12',
            'password_confirmation' => 'required|same:password',
        ];
        $message = [
            // 'name.required' => 'Vui lòng nhập họ tên'
        ];

        $request->validate($rules, $message);
        // Lưu thông in vào bảng customer
        $add = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => bcrypt($request->password)
        ]);
        // kiểm tra thêm mới thành công hay không
        if (!$add) {
            return redirect()->back()->with('error', 'Đăng ký không thành công vui lòng thử lại');
        }
        return redirect()->route('customer.login');
    }
}
