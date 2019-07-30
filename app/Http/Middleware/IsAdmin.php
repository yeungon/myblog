<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        $isLogin = Auth::user();
        $isAdmin = $isLogin->is_admin;

        if($isLogin && $isAdmin === 1){
            return $next($request);
        }
        
        return redirect()->route('admin.index');
    }
}
