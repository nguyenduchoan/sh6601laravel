<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CustomerMiddleWare
{
    public function handle($request, Closure $next)
    {
        // kiểm tra nếu chưa đăng nhập
        if (!Auth::guard('cus')->check()) {
            // chuyển hướng về form đăng nhập
            return redirect()->route('customer.login');
        }
    }
}
