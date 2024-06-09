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
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            if ($request->is('panel*')) {
                return redirect('/panel/login');
            } elseif ($request->is('member*')) {
                return redirect('/login');
            }
        }

        $user = Auth::user();
        
        if (!in_array($user->role, $roles)) {
            if ($user->role == '1' || $user->role == '2') {
                return redirect('/panel/login');
            } elseif ($user->role == '3') {
                return redirect('/login');
            } else {
                return redirect('/'); // Redirect to home or unauthorized page
            }
        }

        return $next($request);
    }
}
