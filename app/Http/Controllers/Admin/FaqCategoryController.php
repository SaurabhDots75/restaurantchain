<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategory;
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
    public function index()
    {
        $faqcategories = FaqCategory::all();
        return view('admin.faqcategories.index', compact('faqcategories'));
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
    public function destroy(string $faqid)
    {
        FaqCategory::find($faqid)->delete();
        return redirect()->route('admin.faqcategories.index')->with('alert-success', 'Faq Category Updated Successfully');
    }
}
