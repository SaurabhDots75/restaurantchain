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
    
        $user = Auth::user();
        $routeName = Route::currentRouteName();
        $cleanedRoute = str_replace('admin.', '', $routeName); // "users.index"
        $currentPermission = str_replace('.', '-', $cleanedRoute); // "users-index"
     
        if ($user->hasRole('Customers')) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'You are not allowed to access this area.');
        }
    
        if ($user->hasRole('Super Admin')) {
            if ($currentPermission === 'restaurant-dashboard') {
                return redirect()->route('admin.home');
            }
            return $next($request);
        }
    
        // If Restaurant
        if ($user->hasRole('Restaurant')) {
            // Redirect from admin home to restaurant dashboard
            if ($currentPermission === 'home') {
                return redirect()->route('admin.restaurant.dashboard');
            }
    
            // Allow access to restaurant dashboard
            if ($currentPermission === 'restaurant-dashboard') {
                return $next($request);
            }
        }
    
        // Get permissions for the user's role
        $role = $user->roles->first(); // Assuming single-role per user
        $permissionNames = DB::table('role_has_permissions')
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('permissions.name')
            ->toArray();
    
        // Check permission for current route
        if (!in_array($currentPermission, $permissionNames)) {
            abort(403, 'You are not authorized to access this page.');
        }
    
        return $next($request);
    }
    
}
