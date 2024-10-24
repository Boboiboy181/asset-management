<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu user đang đăng nhập và có role là admin
        if (Auth::check() && Auth::user()->role === 'Admin') {
            return $next($request);
        }

        // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
        return redirect('/home')->with('error', 'Bạn không có quyền truy cập.');
    }
}

