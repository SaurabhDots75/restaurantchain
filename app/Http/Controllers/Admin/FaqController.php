<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqController extends Controller
{
    /**
     * Show Listing of FAQ
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $faqs = Faq::orderBy('id', 'DESC')->paginate(10);
        return view('admin.faqs.index', compact('faqs'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $faqcategories = FaqCategory::get();
        return view('admin.faqs.create', compact('faqcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',

        ]);
        Faq::create($input);
        return redirect()->route('admin.faqs.index')->with('alert-success', 'Faq Category Added Successfully');
    }

    /**
     * Show records
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
        $faqs = Faq::find($id);
        if (empty($faqs)) {
            return 'URL NOT FOUND';
        }
        $faqcategories = FaqCategory::get();
        return view('admin.faqs.edit', compact('faqs', 'faqcategories'));
    }

    /**
     * Update Records
     *
     * @param Request $request
     * @param string $faqid
     * @return void
     */
    public function update(Request $request, string $faqid)
    {
        $id = base64_decode($faqid);
        if ($id == '') {
            return 'URL NOT FOUND';
        }
        $faqs = Faq::findOrFail($id);
        if (empty($faqs)) {
            return 'URL NOT FOUND';
        }
        $input = $request->all();
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);

        $faqs->fill($input)->save();
        return redirect()->route('admin.faqs.index')->with('alert-success', 'Faq Category updated Successfully');
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
        // Perform deletion logic, e.g., delete from database
        $record = Faq::find($recordId);
        if ($record) {
            $record->delete();
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false, 'message' => 'Record not found'], 404);
    }

    /**
     * Status
     *
     * @param [type] $ids
     * @param [type] $status
     * @return void
     */
    public function status($ids, $status)
    {
        $faqs =  Faq::find($ids);
        if (empty($faqs)) {
            return 'URL NOT FOUND';
        }
        $input['status'] = $status;
        unset($input['_token']);
        $faqs->fill($input)->save();
        return redirect()->route('admin.faqs.index')->with('alert-success', 'Faq Category status updated Successfully');
    }
}
