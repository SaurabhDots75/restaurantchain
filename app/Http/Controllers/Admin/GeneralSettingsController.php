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

class GeneralSettingsController extends Controller
{
    public $model = 'general-settings';

    function __construct()
    {
        $this->middleware('permission:orders-index|orders-create|orders-edit|orders-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:orders-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:orders-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:orders-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request): View
    {

        $addresses = [];
        $phoneNumbers = [];
        $workingHours =[];

    

        return view('admin.general-settings.settings', compact('addresses', 'phoneNumbers', 'workingHours'));
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
