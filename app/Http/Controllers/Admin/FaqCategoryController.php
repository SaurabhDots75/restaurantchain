<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\Faq;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\FaqCategoryLang;
use Illuminate\Support\Facades\DB;
use Str;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $faqcategories = FaqCategory::latest()->paginate(10);
        return view('admin.faqcategories.index', compact('faqcategories'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $faqcategories = FaqCategory::all();
        return view('admin.faqcategories.create', compact('faqcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->except(['_token', '_method']);
        $input = $request->all();
        $request->validate([
            'title' => 'required|max:255',
        ],[
            'title.required' => 'The FAQ Category is mandatory.',
            'title.max' => 'The FAQ Category may not be greater than 255 characters.',
        ]);
        FaqCategory::create($input);
        return redirect()->route('admin.faqcategories.index')->with('alert-success', 'Faq Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return void
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $faqid
     * @return void
     */
    public function edit(string $faqid)
    {
        $id = base64_decode($faqid);
        if ($id == '') {
            return 'URL NOT FOUND';
        }
        $faqcategories = FaqCategory::find($id);
        if (empty($faqcategories)) {
            return 'URL NOT FOUND';
        }
        return view('admin.faqcategories.edit', compact('faqcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return void
     */
    public function update(Request $request, string $id)
    {
        $id = base64_decode($id);
        if ($id == '') {
            return 'URL NOT FOUND';
        }
        $faqcategories = FaqCategory::findOrFail($id);
        if (empty($faqcategories)) {
            return 'URL NOT FOUND';
        }
        $input = $request->all();
        $request->validate([
            'title' => 'required|max:255',
        ],[
            'title.required' => 'The FAQ Category is mandatory.',
            'title.max' => 'The FAQ Category may not be greater than 255 characters.',
        ]);
        $faqcategories->fill($input)->save();
        return redirect()->route('admin.faqcategories.index')->with('alert-success', 'Faq Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $faqid
     * @return void
     */
    public function destroy(Request $request)
    {
        $recordId = $request->input('id');
        $getfaqCount = Faq::where('categories', $recordId)->count();
        // Find the record in the FaqCategory table
        $record = FaqCategory::find($recordId);
        if (!$record) {
            // If record is not found, return response immediately
            return response()->json(['success' => false, 'message' => 'Record not found'], 404);
        }
        // If record is found and there are related FAQs, prevent deletion
        if ($getfaqCount > 0) {
            return response()->json(['success' => false, 'message' => 'Please remove all FAQ before deleting the category'], 404);
        }
        // Delete the record and return success
        $record->delete();
        return response()->json(['success' => true], 200);
    }
}
