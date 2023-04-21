<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CustomerMiddleWare
{
    /**
     * Get the path the customer should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function handle($request, Closure $next)
    {
        // kiểm tra nếu chưa đăng nhập
        if (!Auth::guard('cus')->check()) {
            // chuyển hướng về form đăng nhập
            return redirect()->route('customer.login');
        }
    }
}
