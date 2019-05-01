<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogedOut
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect()->intended('login')->withInput()->with('Terror', 'Bạn Cần Đăng Nhập Để Sử Dụng Tính Năng Này !');
        }
        return $next($request);
    }
}
