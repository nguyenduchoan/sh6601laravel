<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
        $login_data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $check_login = Auth::guard('web')->attempt($login_data);
        if (!$check_login) {
            return redirect()->back()->with('error', 'Đăng nhập không thành công vui lòng thử lại');
        }
        return redirect()->route('index');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function post_register(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|unique:users,email|max:100',
            'phone' => 'required|max:10|regex:/^0[0-9]+$/',
            'address' => 'required|max:255',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];
        $message = [
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'phone.max' => 'Số điện thoại vượt quá 10 kí tự',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Nhập ít nhất 6 kí tự',
            'password_confirmation.required' => 'Vui lòng nhập lại password',
            'password_confirmation.same' => 'Password không trùng khớp'
        ];
        $request->validate($rules, $message);
        // Lưu thông in vào bảng customer
        $add = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password)
        ]);
        // kiểm tra thêm mới thành công hay không
        if ($add) {
            return redirect()->back()->with('error', 'Đăng ký không thành công vui lòng thử lại');
        }
        return redirect()->route('customer.login');
    }
}
