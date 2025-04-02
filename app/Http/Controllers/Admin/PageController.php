<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use URL;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pages = Page::orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.index', compact('pages'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $templates = [];
        $files = File::allFiles(resource_path('views/front/cms_pages'));
        foreach ($files as $key => $value) {
            $explode = explode('.', $value->getfileName());
            $templates[$key]['value'] = $explode[0];
            $templates[$key]['name'] = ucwords(str_replace('_', ' ', $explode[0]));
        }
        $pages = Page::all();
        return view('admin.pages.create', compact('pages', 'templates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'slug' => 'required',
        ],[
            'title.required' => 'The Page Name is mandatory.',
            'title.max' => 'The Page Name may not be greater than 255 characters.',
            'slug.required' => 'The Slug is mandatory.',
            'description.required' => 'The Description is mandatory.',
        ]);
        if ($request->hasFile('image')) {
            $image = singleStorageImageUpload($request->file('image'), 'Post', '1200', '600');
        }
        if (!empty($image)) {
            $input['image'] = $image;
        }
        Page::create($input);
        return redirect()->route('admin.pages.index')->with('alert-success', 'Pages Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $pageid)
    {
        $templates = [];
        $files = File::allFiles(resource_path('views/front/cms_pages'));
        foreach ($files as $key => $value) {
            $explode = explode('.', $value->getfileName());
            $templates[$key]['value'] = $explode[0];
            $templates[$key]['name'] = ucwords(str_replace('_', ' ', $explode[0]));
        }
        $id = base64_decode($pageid);
        if ($id == '') {
            return 'URL NOT FOUND';
        }
        $pages = Page::find($id);

        if (empty($pages)) {
            return 'URL NOT FOUND';
        }
        return view('admin.pages.edit', compact('pages', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $pageid)
    {
        $id = base64_decode($pageid);
        if ($id == '') {
            return 'URL NOT FOUND';
        }
        $pages = Page::findOrFail($id);
        if (empty($pages)) {
            return 'URL NOT FOUND';
        }
        $input = $request->all();
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'slug' => 'required',
        ],[
            'title.required' => 'The Page Name is mandatory.',
            'title.max' => 'The Page Name may not be greater than 255 characters.',
            'description.required' => 'The Description is mandatory.',
            'slug.required' => 'The Slug is mandatory.',
        ]);
        /*image update*/
        if ($request->hasFile('image')) {
            $image = '';
            $image = singleStorageImageUpload($request->file('image'), 'Post', '1200', '600');
        }
        if (!empty($image)) {
            $input['image'] = $image;
        }
        $pages->fill($input)->save();
        return redirect()->route('admin.pages.index')->with('alert-success', 'Pages Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $recordId = $request->input('id');
        // Perform deletion logic, e.g., delete from database
        $record = Page::find($recordId);
        if ($record) {
            $record->delete();
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false, 'message' => 'Record not found'], 404);
    }
    /**
     * Status
     */
    public function status($ids, $status)
    {
        $ids = base64_decode($ids);
        $pages =  Page::find($ids);
        if (empty($pages)) {
            return 'URL NOT FOUND';
        }
        $input['status'] = $status;
        unset($input['_token']);
        $pages->fill($input)->save();
        return redirect()->action('Admin\PageController@index')->with('alert-success', 'Page Status Updated Successfully');
    }
}
