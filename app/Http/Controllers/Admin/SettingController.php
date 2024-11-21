<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $setting = Setting::first();
        return view('admin.setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request): RedirectResponse
    {
        
        // if ($image = $request->file('logo_url')) {
        //     $logoImage = date('YmdHis'). rand() . "." . $image->getClientOriginalExtension();
        //     $request->image->storeAs('images', $logoImage);
        //     $input['image'] = "$logoImage";
        // }
        // if ($image = $request->file('favicon_url')) {
        //     $faviconImage = date('YmdHis'). rand() . "." . $image->getClientOriginalExtension();
        //     $request->image->storeAs('images', $faviconImage);
        //     $input['image'] = "$faviconImage";
        // }

        Setting::create($request->validated());
        return redirect()->route('admin.setting.index')->with('success','Settings Modified successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $setting = Setting::find($id);
        $request->validate([
            'title' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $input = $request->all();
        $setting->update($input);
        return redirect()->route('admin.setting.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
