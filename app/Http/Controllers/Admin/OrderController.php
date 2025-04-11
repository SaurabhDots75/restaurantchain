<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public $model = 'orders';

    function __construct()
    {
        $this->middleware('permission:orders-index|orders-create|orders-edit|orders-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:orders-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:orders-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:orders-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request): View
    {
        $query = Order::query();
        if (!Auth::user()->hasRole('Super Admin')) {
            $query->where('restaurant_id', auth()->user()->restaurant_id);
        }
        $searchVariable = [];
        $searchData = $request->except(['display', '_token', 'order', 'sortBy', 'page']);
        $query->with('restaurant', 'user', 'orderItems');
        foreach ($searchData as $fieldName => $fieldValue) {
            if (!empty($fieldValue)) {
                if ($fieldName == "status") {
                    $query->where("status", 'like', '%' . $fieldValue . '%');
                } elseif ($fieldName == "name") {
                    $query->whereHas('user', function ($q) use ($fieldValue) {
                        $q->where('name', 'like', '%' . $fieldValue . '%');
                    });
                }

                $searchVariable[$fieldName] = $fieldValue;
            }
        }


        $perPage = $request->get('per_page', 10);
        $orders = $query->latest()->paginate($perPage);
        return view('admin.orders.index', compact('orders', 'searchVariable'));
    }



    public function show($id): View
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.orders.show', compact('restaurant'));
    }



    public function toggleStatus(Request $request)
    {
        $restaurant = Restaurant::findOrFail($request->id);
        $restaurant->is_active = $request->is_active;
        $restaurant->save();

        return response()->json(['message' => 'Status updated']);
    }
}
