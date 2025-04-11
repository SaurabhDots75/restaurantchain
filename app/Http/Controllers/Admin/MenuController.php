<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Menus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
	public function index(Request $request)
	{
		$query = Menu::query();


		if ($request->filled('name')) {
			$query->where('name', 'like', '%' . $request->name . '%');
		}


		if ($request->has('is_active') && $request->is_active !== '') {
			$query->where('is_active', $request->is_active);
		}

		$menus = $query->orderBy('sort_order', 'asc')->paginate(10);

		return view('admin.menus.index', compact('menus'));
	}

	public function create()
	{
		return view('admin.menus.create', []);
	}


	public function store(Request $request)
	{


		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'description' => 'nullable|string|max:1000',
			'start_time' => 'required|date_format:H:i',
			'end_time' => 'required|date_format:H:i',
			'days_active' => 'required|array',
			'days_active.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);


		$imagePath = null;
		if ($request->hasFile('image')) {
			$imagePath = $request->file('image')->store('menus', 'public');
		}


		$menu = new Menu();
		$menu->name = $validated['name'];
		$menu->description = $validated['description'];
		$menu->start_time = $validated['start_time'];
		$menu->end_time = $validated['end_time'];
		$menu->days_active = json_encode($validated['days_active']);
		$menu->image = $imagePath;
		$menu->restaurant_id = $request->restaurant_id ?? '5';

		$menu->save();


		return redirect()->route('admin.menus.index')->with('success', 'Menu created successfully!');
	}
	public function edit($id)
	{
		$menu = Menu::findOrFail($id); // Retrieve the menu item by ID

		return view('admin.menus.edit', compact('menu')); // Pass the menu to the view
	}

	public function update(Request $request, $id)
	{
		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'description' => 'nullable|string|max:1000',
			'start_time' => 'required|date_format:H:i',
			'end_time' => 'required|date_format:H:i',
			'days_active' => 'required|array',
			'days_active.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		$menu = Menu::findOrFail($id); // Retrieve the menu item by ID

		if ($request->hasFile('image')) {
			$imagePath = $request->file('image')->store('menus', 'public');
			$menu->image = $imagePath;
		}

		$menu->name = $validated['name'];
		$menu->description = $validated['description'];
		$menu->start_time = $validated['start_time'];
		$menu->end_time = $validated['end_time'];
		$menu->days_active = json_encode($validated['days_active']);
		$menu->restaurant_id = $request->restaurant_id ?? '5';

		$menu->save();

		return redirect()->route('admin.menus.index')->with('success', 'Menu updated successfully!');
	}

	public function destroy($id)
	{
		$menu = Menu::findOrFail($id);

		if ($menu->image) {
			Storage::disk('public')->delete($menu->image);
		}

		$menu->delete();

		return redirect()->route('admin.menus.index')->with('success', 'Menu deleted successfully.');
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
