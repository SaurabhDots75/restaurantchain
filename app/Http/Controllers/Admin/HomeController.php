<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {

        $totalUser = User::count();
        $totalResturants = Restaurant::count();
        $restaurantId = Auth::user()->restaurant_id;
        $totalOrder = Order::where('restaurant_id', $restaurantId)->count();

        $totalCompletedOrder = Order::where('restaurant_id', $restaurantId)
            ->where('status', 'completed')
            ->count();
        $totalPendingOrder = Order::where('restaurant_id', $restaurantId)
            ->where('status', 'pending')
            ->count();

        $recentOrders = Order::where('restaurant_id', $restaurantId)
            ->latest()
            ->take(5)
            ->with('user', 'orderItems')
            ->get();
        return view('admin.dashboard.home', compact('totalUser', 'totalResturants', 'totalOrder', 'totalCompletedOrder', 'totalPendingOrder', 'recentOrders'));
    }
    public function restaurantDashboard()
    {
        $totalUser = User::count();
        $totalResturants = Restaurant::count();
        $restaurantId = Auth::user()->restaurant_id;
        $totalOrder = Order::where('restaurant_id', $restaurantId)->count();

        $totalCompletedOrder = Order::where('restaurant_id', $restaurantId)
            ->where('status', 'completed')
            ->count();
        $totalPendingOrder = Order::where('restaurant_id', $restaurantId)
            ->where('status', 'pending')
            ->count();

        $recentOrders = Order::where('restaurant_id', $restaurantId)
            ->latest()
            ->take(5)
            ->with('user', 'orderItems')
            ->get();
        return view('admin.dashboard.dashboard', compact('totalUser', 'totalResturants', 'totalOrder', 'totalCompletedOrder', 'totalPendingOrder', 'recentOrders'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('admin.managerHome');
    }
}
