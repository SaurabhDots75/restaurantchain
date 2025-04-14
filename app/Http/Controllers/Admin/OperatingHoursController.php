<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OperatingHoursController extends Controller
{
    public function index()
    {
        $query = Restaurant::query();
        if (Auth::user()->hasRole('Restaurant')) {
            $query->where('user_id', Auth::user()->id);
        }
        $restaurants = $query->get();
        return view('admin.operating-hours.index', compact('restaurants'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'restaurants' => 'required|array',
            'restaurants.*' => 'required|array',
            'restaurants.*.opening_time' => 'required',
            'restaurants.*.closing_time' => 'required'
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->restaurants as $restaurantId => $hours) {
                Restaurant::where('id', $restaurantId)->update([
                    'opening_time' => $hours['opening_time'],
                    'closing_time' => $hours['closing_time']
                ]);
            }

            DB::commit();
            return redirect()->route('admin.operating-hours.index')
                ->with('success', 'Operating hours updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Failed to update operating hours. Please try again.');
        }
    }
}
