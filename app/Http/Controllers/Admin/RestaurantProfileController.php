<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class RestaurantProfileController extends Controller
{
    public function edit()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $restaurant = Restaurant::first();
        }else{

            $restaurant = Restaurant::where('id' , Auth::user()->restaurant_id)->first(); // Assuming a single restaurant setup
        }
        return view('admin.restaurant-profile.edit', compact('restaurant'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'website_url' => 'nullable|url',
            // 'opening_time' => 'nullable|date_format:H:i',
            // 'closing_time' => 'nullable|date_format:H:i|after:opening_time',
            'logo' => 'nullable|image|max:2048',
            'cover_image' => 'nullable|image|max:4096',
        ]);
    
        $restaurant = Restaurant::find(auth()->user()->restaurant_id);
    
        if (!$restaurant) {
            return redirect()->back()->with('error', 'Restaurant not found.');
        }
    
        $data = $request->only([
            'name',
            'address',
            'website_url',
            'opening_time',
            'closing_time',
        ]);
    
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
    
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('cover_images', 'public');
        }
    
        $restaurant->update($data);
    
        return redirect()->route('admin.restaurant-profile.edit')
            ->with('success', 'Restaurant profile updated successfully.');
    }
    
}