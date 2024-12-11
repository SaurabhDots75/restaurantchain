<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\SlugController;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $getData = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('getData'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Create Form show
     *
     * @param [type] $catId
     * @return void
     */
    public function create($catId = null) {
        $result = [
            'getData' => $catId ? Category::where('slug', $catId)->first() : ''
        ];
        return view('admin.categories.create', $result);
    }

    /**
     * Store Category list
     *
     * @param Request $request
     * @return void
     */
    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ],[
            'title.required' => 'The Category Title is mandatory.',
            'title.max' => 'The Category Title may not be greater than 255 characters.',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }

        if (empty($request->table_id)) {
            $newCustomSlug = $this->generateSlug($request);
        }else{
            $newCustomSlug = $request->slug;
        }

        $request->merge(['parent_id' => $this->resolveParentId($request)]);

        $categoryData = $this->prepareCategoryData($request, $newCustomSlug);
        Category::updateOrCreate(['id' => $request->table_id ?? null], $categoryData);

        $message = isset($request->table_id) && !empty($request->table_id)
            ? 'Successfully updated!!!'
            : 'Successfully added!!!';

        return redirect()->route('admin.categories')->with('alert-success', $message);
    }

    private function generateSlug($request)
    {
        if (isset($request->table_id) && !empty($request->table_id) && $request->slug_bk != $request->slug) {
            $slugController = new SlugController;
            return $slugController->makeNewSlugName('Category', $request->name, $request->slug);
        }

        $slugController = new SlugController;
        return $slugController->makeNewSlugName('Category', $request->name, $request->slug);
    }

    private function resolveParentId($request)
    {
        $tableId = $request->input('table_id', null);
        $parentId = $request->input('parent_id', 0);
        if (!empty($tableId) && ($tableId == $parentId || empty($parentId))) {
            return 0;
        }
        return $parentId;
    }

    private function prepareCategoryData($request, $newCustomSlug)
    {
        return [
            'name' => $request->name,
            'title' => $request->title ?? '',
            'slug' => strtolower($newCustomSlug),
            'status' => $request->status ?? 0,
            'parent_id' => $request->parent_id ?? 0,
            'short_description' => $request->short_description ?? '',
            'description' => $request->description,
            'faq_title' => $request->faq_title,
            'faq_category' => $request->faq_category,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'image_url' => $this->uploadImage($request, 'image_url'),
            'banner_image_url' => $this->uploadImage($request, 'banner_image_url'),
        ];
    }

    private function uploadImage($request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            return $request->file($fieldName)->store('images', 'public');
        }
        return null;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $recordId = $request->input('id');
        // Find the record in the Category table
        $record = Category::find($recordId);
        if (!$record) {
            // If the record is not found, return a response immediately
            return response()->json(['success' => false, 'message' => 'Record not found'], 404);
        }
        // Check if the category has any child categories
        $hasChildren = Category::where('parent_id', $recordId)->exists();
        if ($hasChildren) {
            // If there are child categories, prevent deletion
            return response()->json([
                'success' => false,
                'message' => 'Category cannot be deleted because it has child or sub-child categories.'
            ], 400);
        }
        // If no child categories exist, delete the record
        $record->delete();
        return response()->json(['success' => true, 'message' => 'Category deleted successfully'], 200);

    }

    public function getHierarchy()
    {
        // Fetch categories with parent-child relationships
        $categories = Category::orderBy('parent_id')
            ->get()
            ->groupBy('parent_id');

        // Structure data into hierarchy
        $structuredCategories = $this->buildHierarchy($categories);

        return response()->json($structuredCategories);
    }

    private function buildHierarchy($categories, $parentId = 0)
    {
        $hierarchy = [];
        if (isset($categories[$parentId])) {
            foreach ($categories[$parentId] as $category) {
                $hierarchy[] = [
                    'id' => $category->id,
                    'title' => $category->title,
                    'children' => $this->buildHierarchy($categories, $category->id),
                ];
            }
        }
        return $hierarchy;
    }
}
