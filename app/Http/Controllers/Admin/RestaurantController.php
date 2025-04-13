<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        $query = Restaurant::query();
        $searchVariable = [];
        $searchData = $request->except(['display', '_token', 'order', 'sortBy', 'page']);

        foreach ($searchData as $fieldName => $fieldValue) {
            if (!empty($fieldValue)) {
                if ($fieldName == "name") {
                    $query->where("name", 'like', '%' . $fieldValue . '%');
                } elseif ($fieldName == "email") {
                    $query->where("email", 'like', '%' . $fieldValue . '%');
                } elseif ($fieldName == "address") {
                    $query->where("address", 'like', '%' . $fieldValue . '%');
                } elseif ($fieldName == "phone") {
                    $query->where("phone", 'like', '%' . $fieldValue . '%');
                }

                $searchVariable[$fieldName] = $fieldValue;
            }
        }

        $query = $query->orderBy('created_at', 'desc');

        $restaurants = $query->paginate($request->input('per_page', 10));


        return view('admin.restaurants.index', compact('restaurants', 'searchVariable'))
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
            'name'               => 'required|string|max:255',
            'address'            => 'required|string|max:500',
            'phone'              => 'required|digits_between:10,15|unique:restaurants,phone',
            'email'              => 'required|email|unique:restaurants,email',
            'city'               => 'nullable|string|max:255',
            'state'              => 'nullable|string|max:255',
            'country'            => 'nullable|string|max:255',
            'zip_code'           => 'nullable|string|max:20',
            'description'        => 'nullable|string|max:1000',
            'opening_time'       => 'nullable|date_format:H:i',
            'closing_time'       => 'nullable|date_format:H:i',
            'registration_number' => 'nullable|string|max:255',
            'website_url'        => 'nullable|url|max:255',
            'delivery_enabled'   => 'nullable',
            'dine_in_enabled'    => 'nullable',
            'pickup_enabled'     => 'nullable',
            'logo'               => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048',
            'cover_image'        => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        
        $input = $request->all();

        
        if ($request->hasFile('logo')) {
            $input['logo'] = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('cover_image')) {
            $input['cover_image'] = $request->file('cover_image')->store('cover_images', 'public');
        }

        
        Restaurant::create($input);

        
        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant created successfully.');
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
        $restaurant = Restaurant::findOrFail($id);

        
        $validator = Validator::make($request->all(), [
            'name'               => 'required|string|max:255',
            'address'            => 'required|string|max:500',
            'phone'              => "required|digits_between:10,15|unique:restaurants,phone,$id",
            'email'              => "required|email|unique:restaurants,email,$id",
            'city'               => 'nullable|string|max:255',
            'state'              => 'nullable|string|max:255',
            'country'            => 'nullable|string|max:255',
            'zip_code'           => 'nullable|string|max:20',
            'description'        => 'nullable|string|max:1000',
            'opening_time'       => 'nullable|date_format:H:i',
            'closing_time'       => 'nullable|date_format:H:i',
            'registration_number' => 'nullable|string|max:255',
            'website_url'        => 'nullable|url|max:255',
            'delivery_enabled'   => 'nullable',
            'dine_in_enabled'    => 'nullable',
            'pickup_enabled'     => 'nullable',
            'logo'               => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048',
            'cover_image'        => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        
        $input = $request->all();

        
        if ($request->hasFile('logo')) {
            
            if ($restaurant->logo) {
                Storage::delete('public/' . $restaurant->logo);
            }

            
            $input['logo'] = $request->file('logo')->store('logos', 'public');
        }

        
        if ($request->hasFile('cover_image')) {
            
            if ($restaurant->cover_image) {
                Storage::delete('public/' . $restaurant->cover_image);
            }

            
            $input['cover_image'] = $request->file('cover_image')->store('cover_images', 'public');
        }

        
        $restaurant->update($input);

        
        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant updated successfully.');
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

        return response()->json(['error' => false, 'message' => 'Restaurant not found'], 404);
    }

    public function toggleStatus(Request $request)
    {
        $restaurant = Restaurant::findOrFail($request->id);
        $restaurant->is_active = $request->is_active;
        $restaurant->save();

        return response()->json(['message' => 'Status updated']);
    }
}
