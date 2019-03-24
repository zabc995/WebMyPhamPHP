<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminLoginMiddleware
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
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->quyenhan == 1)
                return $next($request);
            else
                return redirect('admin/dangnhap');   
        }
        else
        {
            return redirect('admin/dangnhap');
        }
        return $next($request);
    }
}
