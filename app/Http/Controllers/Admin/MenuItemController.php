<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    public function index(Request $request)
    {
        $query = MenuItem::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $menuItems = $query->with('category')->paginate(10);
        $categories = Category::all(); // Or some other way of getting categories

        return view('admin.menu_items.index', compact('menuItems', 'categories'));
    }
    public function create()
    {
        $categories = Category::all();
        $menus = Menu::all();
        $restaurants = Restaurant::all();

        return view('admin.menu_items.create', compact('categories', 'menus', 'restaurants'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'menu_id' => 'required|exists:menus,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // 2MB max image size
            'is_veg' => 'required|boolean',
            'preparation_time' => 'required|numeric|min:1',
            'stock_quantity' => 'required|numeric|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_images', 'public');
        }

        MenuItem::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'restaurant_id' => $request->restaurant_id,
            'menu_id' => $request->menu_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'is_veg' => $request->is_veg,
            'preparation_time' => $request->preparation_time,
            'stock_quantity' => $request->stock_quantity,
        ]);

        return redirect()->route('admin.food_items.index')->with('success', 'Food item created successfully.');
    }
    public function edit($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $categories = Category::all();
        $menus = Menu::all();
        $restaurants = Restaurant::all();

        return view('admin.menu_items.edit', compact('menuItem', 'categories', 'menus', 'restaurants'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'menu_id' => 'required|exists:menus,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // 2MB max image size
            'is_veg' => 'required|boolean',
            'preparation_time' => 'required|numeric|min:1',
            'stock_quantity' => 'required|numeric|min:0',
        ]);

        $menuItem = MenuItem::findOrFail($id);

        // Handle image upload if provided
        $imagePath = $menuItem->image; // Keep existing image if no new image is uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_images', 'public');
        }

        // Update the MenuItem
        $menuItem->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'restaurant_id' => $request->restaurant_id,
            'menu_id' => $request->menu_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'is_veg' => $request->is_veg,
            'preparation_time' => $request->preparation_time,
            'stock_quantity' => $request->stock_quantity,
        ]);

        return redirect()->route('admin.food_items.index')->with('success', 'Food item updated successfully.');
    }

    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);

        if ($menuItem->image) {
            Storage::disk('public')->delete($menuItem->image);
        }

        $menuItem->delete();

        return redirect()->route('admin.food_items.index')->with('success', 'Food item deleted successfully.');
    }
    public function show($id)
    {
        $menuItem = MenuItem::findOrFail($id);

        if ($menuItem->image) {
            Storage::disk('public')->delete($menuItem->image);
        }

        $menuItem->delete();

        return redirect()->route('admin.food_items.index')->with('success', 'Food item deleted successfully.');
    }
}
