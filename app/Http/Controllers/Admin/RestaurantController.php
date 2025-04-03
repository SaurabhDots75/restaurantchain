<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    public $model = 'restaurants';

    public function __construct(Restaurant $restaurant)
    {
        $this->model = $restaurant;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $restaurants = Restaurant::latest()->paginate(10);
        return view('admin.restaurants.index', compact('restaurants'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|digits_between:10,15|unique:restaurants,phone',
            'email' => 'required|email|unique:restaurants,email',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        Restaurant::create($request->all());
    
        return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant created successfully.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $restaurantId  =  base64_decode($id);
        $restaurant = Restaurant::findOrFail($restaurantId);
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Find the restaurant
        $restaurant = Restaurant::findOrFail($id);
    
        // Custom validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => "required|digits_between:10,15|unique:restaurants,phone,$id",
            'email' => "required|email|unique:restaurants,email,$id",
        ]);
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Update restaurant details
        $restaurant->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ]);
    
        // Redirect back with success message
        return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $restaurantId = $request->input('id');
        $restaurant = Restaurant::find($restaurantId);

        if ($restaurant) {
            $restaurant->delete();
            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false, 'message' => 'Restaurant not found'], 404);
    }
}
