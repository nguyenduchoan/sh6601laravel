<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;



class customercontroller extends Controller
{
   public function  login(){
    return view('customer.login');
   }

   public function post_login(Request $request){
    $login_data = [
 'email' => $request->email,
 'password' => $request->password
 ];
 $check_login = Auth::guard('cus')->attempt($login_data);
 if(! $check_login){
 return redirect()->back()->with('error','Đăng nhập không thành công vui lòng thử lại');
 }
 return redirect()->route('home');
   }

   public function register(){
    return view('customer.register');
   }

   public function post_register(Request $request){
     $rule = [
           'name'=>'required|max:100',
           'email' => 'required|unique:customers|max:100',
           'address'=>'required|max:200',
           'password'=>'required|min:6|max:12',
           'password_confirmation' => 'required|same:password',
     ];

     $message =[
             /// Lưu thông in vào bảng customer
     ];

     $request -> validate($rule, $message);

     $add = customer::create([
             'name' => $request->name,
             'email' =>$request->email,
             'address'=>$request->address,
             'password' =>bcrypt($request->password),
     ]);

    //  dd($add);

     if(!$add){
        return redirect()->back()->with('đằng ký ko thành công!');
     }
        return redirect()->route('customer.login');
   }
   public function logout(){
    Auth::logout();
    Session::flush();
    return redirect()->route('customer.login');
   }
}
