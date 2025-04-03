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

        // $user = Auth::user();
        // $routeName = $request->route()->getName(); 

        // $cleanRouteName = str_replace('admin.', '', $routeName);

        // $segments = explode('.', $cleanRouteName);
        // if (!empty($segments[0])) {
        //     $segments[0] = Str::singular($segments[0]); 
        // }
        // $finalRouteName = implode('.', $segments);

        // if (!$user->can($finalRouteName)) {
        //     return redirect()->route('admin.home')->with('error', 'You do not have permission to access this page.');
        // }
       
        
        if (!Auth::check()) {
            // return redirect()->route('admin.login')->with('error', 'You must log in first.');
            return redirect()->route('admin.login');
        }

      
        return $next($request);
    }
}
