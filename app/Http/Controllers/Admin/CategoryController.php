<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Menus;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
	public function index(Request $request)
	{
		$query = Category::query();

		if ($request->has('name')) {
			$query->where('name', 'like', '%' . $request->name . '%');
		}

		if ($request->has('status')) {
			$query->where('status', $request->status);
		}

		$categories = $query->paginate(10);

		return view('admin.category.index', compact('categories'));
	}

	public function create()
	{
		$restaurants = Restaurant::all();
		return view('admin.category.create', compact('restaurants'));
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'description' => 'nullable|string|max:1000',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
			'restaurant_id' => 'nullable|exists:restaurants,id',
		]);

		$imagePath = null;
		if ($request->hasFile('image')) {
			$imagePath = $request->file('image')->store('categories', 'public');
		}

		$category = new Category();
		$category->name = $validated['name'];
		$category->slug = $validated['slug'] ?? \Str::slug($validated['name']);
		$category->description = $validated['description'] ?? null;
		$category->image = $imagePath;
		$category->restaurant_id = $validated['restaurant_id'] ?? 5; // fallback restaurant if needed

		$category->save();

		return redirect()->route('admin.category.index')->with('success', 'Category created successfully!');
	}

	public function edit($id)
	{
		$category = Category::findOrFail($id);
		return view('admin.category.edit', compact('category'));
	}
	public function update(Request $request, $id)
	{
		$category = Category::findOrFail($id);
	
		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'slug' => 'nullable|string|max:255|unique:categories,slug,' . $id,
			'description' => 'nullable|string|max:1000',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
	
		if ($request->hasFile('image')) {
			$imagePath = $request->file('image')->store('categories', 'public');
			$category->image = $imagePath;
		}
	
		$category->name = $validated['name'];
		$category->slug = $validated['slug'] ?? \Str::slug($validated['name']);
		$category->description = $validated['description'] ?? null;
		$category->save();
	
		return redirect()->route('admin.category.index')->with('success', 'Category updated successfully!');
	}
	

	public function destroy($id)
	{
		$category = Category::findOrFail($id);
	
		if ($category->image) {
			Storage::disk('public')->delete($category->image);
		}
	
		$category->delete();
	
		return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully!');
	}
	
	public function show($id)
	{
		$menu = Menu::findOrFail($id);

		if ($menu->image) {
			Storage::disk('public')->delete($menu->image);
		}

		$menu->delete();

		return redirect()->route('admin.menus.index')->with('success', 'Menu deleted successfully.');
	}
}
