<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreAccessMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // Kiểm tra đăng nhập trước khi kiểm tra vai trò
        $user = Auth::user();

        if (!$user) {
            return redirect('/login'); // Hoặc thực hiện xử lý tương tự nếu không có người dùng nào đăng nhập
        }

        if ($user->role === 'admin') {
            return $next($request); // Admin có quyền truy cập tất cả
        }

        if ($user->role === 'employee' && $user->store_id === $request->route('store_id')) {
            return $next($request); // Employee chỉ có quyền truy cập store của mình
        }

        if ($user->role === 'user') {

            return $next($request); // User chỉ cần đăng nhập, không cần user_id
        }

        return redirect('/login');
    }
}
