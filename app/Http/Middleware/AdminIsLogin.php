<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminIsLogin
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
        if(!session(ADMIN_AUTH_SESSION)){
            return redirect('admin/login');
        }

        return $next($request);
    }
}
