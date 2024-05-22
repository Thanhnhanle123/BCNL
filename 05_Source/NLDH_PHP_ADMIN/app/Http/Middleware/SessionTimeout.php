<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (Auth::check()) {
            $lastLogin = Auth::user()->last_login_at;
            $timeout = Carbon::parse($lastLogin)->addHours(24);

            // Kiểm tra nếu thời gian hiện tại đã quá 24 giờ kể từ lần đăng nhập cuối
            if (Carbon::now()->greaterThan($timeout)) {
                Auth::logout();
                return redirect()->route('login.index')->withErrors(['message' => 'Phiên của bạn đã hết hạn. Xin vui lòng đăng nhập lại.']);
            }
        }

        return $next($request);
    }
}
