<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     // public function handle(Request $request, Closure $next): Response
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        if (Auth::guard('admin')->user()->role != $roles) {
            return redirect('panel/')->with('error', 'Anda tidak punya akses');
        }
        return $next($request);
    }
}
