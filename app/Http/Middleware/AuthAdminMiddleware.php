<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }


        if (Auth::check() && Auth::user()->hasRole('Super Admin')) {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->hasRole('Customers')) {
            Auth::logout(); 
            return redirect()->route('admin.login')->with('error', 'You are not allowed to access this area.');
        }

      
        $role = Auth::user()->roles->first();
        $permissionNames = DB::table('role_has_permissions')
        ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
        ->where('role_has_permissions.role_id', $role->id)
        ->pluck('permissions.name')
        ->toArray();

        $routeurl  = Route::currentRouteName();

        $cleanedRoute = str_replace('admin.', '', $routeurl); // "users.index"
        $currentroute = str_replace('.', '-', $cleanedRoute); // "users-index"
        
        if (!in_array($currentroute, $permissionNames)) {
            abort(403, 'You are not authorized to access this page.');
        }
      
      
        return $next($request);
    }
}
