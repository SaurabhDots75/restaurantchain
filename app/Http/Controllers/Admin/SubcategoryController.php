<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Subcategory::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $subcategories = $query->with(['category', 'restaurant'])->paginate(10);
        $categories = Category::all();

        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('admin.subcategory.create', compact('categories', 'restaurants'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'restaurant_id' => 'required|exists:restaurants,id',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $validated['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('subcategories', 'public');
        }

        Subcategory::create($validated);

        return redirect()->route('admin.subcategory.index')
            ->with('success', 'Subcategory created successfully');
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories', 'restaurants'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'restaurant_id' => 'required|exists:restaurants,id',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $validated['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if ($subcategory->image) {
                Storage::disk('public')->delete($subcategory->image);
            }
            $validated['image'] = $request->file('image')->store('subcategories', 'public');
        }

        $subcategory->update($validated);

        return redirect()->route('admin.subcategory.index')
            ->with('success', 'Subcategory updated successfully');
    }

    public function destroy(Subcategory $subcategory)
    {
        if ($subcategory->image) {
            Storage::disk('public')->delete($subcategory->image);
        }

        $subcategory->delete();

        return redirect()->route('admin.subcategory.index')
            ->with('success', 'Subcategory deleted successfully');
    }
}