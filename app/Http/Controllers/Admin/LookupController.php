<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lookup;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LookupController extends Controller
{
    public function index(Request $request, $type): View
    {
        $query = Lookup::query();
        $query->where('lookup_type', $type);
        
        $searchVariable = [];
        $searchData = $request->except(['display', '_token', 'order', 'sortBy', 'page']);

        if (isset($searchData['name'])) {
            $query->where('name', 'like', '%' . $searchData['name'] . '%');
            $searchVariable['name'] = $searchData['name'];
        }

        $query = $query->orderBy('created_at', 'desc');
        $lookups = $query->paginate($request->input('per_page', 10));

        return view('admin.lookups.index', compact('lookups', 'searchVariable', 'type'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create($type): View
    {
        return view('admin.lookups.create', compact('type'));
    }

    public function store(Request $request, $type)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'boolean'
        ]);

        Lookup::create([
            'name' => $request->name,
            'lookup_type' => $type,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.lookups.index', $type)
            ->with('success', ucfirst($type) . ' lookup created successfully');
    }

    public function edit($type, Lookup $lookup): View
    {
        return view('admin.lookups.edit', compact('lookup', 'type'));
    }

    public function update(Request $request, $type, Lookup $lookup)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'boolean'
        ]);

        $lookup->update([
            'name' => $request->name,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.lookups.index', $type)
            ->with('success', ucfirst($type) . ' lookup updated successfully');
    }

    public function destroy($type, Lookup $lookup)
    {
        $lookup->delete();

        return redirect()->route('admin.lookups.index', $type)
            ->with('success', ucfirst($type) . ' lookup deleted successfully');
    }
}