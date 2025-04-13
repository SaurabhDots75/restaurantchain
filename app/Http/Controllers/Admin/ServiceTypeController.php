<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ServiceTypeController extends Controller
{
    public function index(): View
    {
        $restaurants = Restaurant::all();
        return view('admin.service-type.index', compact('restaurants'));
    }

    public function update(Request $request): RedirectResponse
    {
        $serviceTypes = $request->input('service_types', []);

        foreach ($serviceTypes as $restaurantId => $types) {
            $restaurant = Restaurant::findOrFail($restaurantId);
            
            $restaurant->update([
                'dine_in_enabled' => in_array('dine_in', $types ?? []),
                'pickup_enabled' => in_array('pickup', $types ?? []),
                'delivery_enabled' => in_array('delivery', $types ?? [])
            ]);
        }

        return redirect()->route('admin.service-type.index')
            ->with('success', 'Service types updated successfully');
    }
}