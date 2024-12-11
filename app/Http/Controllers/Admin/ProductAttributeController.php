<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;

class ProductAttributeController extends Controller
{
    public function index(Request $request)
    {
        $attributes = Attribute::with('variations')->paginate(10);
        return view('admin.attributes.index', compact('attributes'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'variations' => 'nullable|array',
            'variations.*' => 'required|string|max:255'
        ]);

        $attribute = Attribute::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        if (!empty($validated['variations'])) {
            foreach ($validated['variations'] as $variation) {
                $attribute->variations()->create(['value' => $variation]);
            }
        }

        return redirect()->route('admin.products.product-attributes.index')->with('success', 'Attribute created successfully!');
    }

    public function edit($id)
    {
        $attribute = Attribute::with('variations')->findOrFail($id);
        return view('admin.attributes.edit', compact('attribute'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'variations' => 'nullable|array',
            'variations.*.value' => 'required|string|max:255',
        ]);

        $attribute = Attribute::findOrFail($id);
        $attribute->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        $attribute->variations()->delete();
        if (!empty($validated['variations'])) {
            foreach ($validated['variations'] as $variation) {
                $attribute->variations()->create(['value' => $variation['value']]);
            }
        }

        return redirect()->route('admin.products.product-attributes.index')->with('success', 'Attribute updated successfully!');
    }

    public function destroy(Request $request)
    {
        $recordId = $request->input('id');

        // Perform deletion logic, e.g., delete from database
        $record = Attribute::find($recordId);
        if ($record) {
            $record->variations()->delete();
            $record->delete();
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false, 'message' => 'Record not found'], 404);
    }
}
