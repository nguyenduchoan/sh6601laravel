<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function login()
    {
        // gọi view hiển thị form đăng nhập
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
        return redirect()->route('home');
    }

    public function register()
    {
        // gọi view hiển thị form đăng ký
        return view('customer.register');
    }

    public function post_register(Request $request)
    {
        // code thực hiện đăng ký
        // validae dữ liệu trên form
        $rules = [
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:customers', 'max:100'],
            'phone' => ['required', 'max:50'],
            'address' => ['required', 'max:200'],
            'password' => ['required', 'min:6', 'max:12', 'confirmed'],
        ];
        $message = [
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã được sử dụng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password phải có độ dài từ 6 đến 12 kí tự',
            'password.max' => 'Password phải có độ dài từ 6 đến 12 kí tự',
            'password.confirmed' => 'Nhập lại Password không trùng khớp'
        ];
        $validated = $request->validate($rules, $message);
        // Lưu thông in vào bảng customer
        $add = Customer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'gender' => $request->gender,
            'password' => bcrypt($validated['password'])
        ]);
        // kiểm tra thêm mới thành công hay không
        if (!$add) {
            return redirect()->back()->with('error', 'Đăng ký không thành công vui lòng thử lại');
        }
        return redirect()->route('customer.login');
    }
}
