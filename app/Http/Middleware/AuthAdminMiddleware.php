<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Str;
class AuthAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (Auth::check() && Auth::user()->hasRole('Customers')) {
            Auth::logout(); 
            return redirect()->route('admin.login')->with('error', 'You are not allowed to access this area.');
        }

        
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

      
        return $next($request);
    }
}
