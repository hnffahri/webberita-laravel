<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('user')->check()) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
