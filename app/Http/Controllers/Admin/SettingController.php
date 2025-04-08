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
    public function index()
	{
		$settingData = Setting::get();
		return view('admin.settings.index', compact('settingData'));
	}

    public function update(Request $request)
	{
		$request->request->remove('_token'); // to remove property from $request
		$input = $request->all();
        
		foreach ($input as $key => $value) {
			if ($key == 'logo') {
				if ($request->hasFile('logo')) {
					$image = '';
					$uploadpath = public_path().'/images/logo';
					$request->file('logo')->getClientOriginalName();
					if (!empty($request->file('logo'))) {
						$image_prefix = 'logo_' . rand(0, 999999999) . '_' . date('d_m_Y_h_i_s');
						$ext = $request->file('logo')->getClientOriginalExtension();
						$image = $image_prefix . '.' . $ext;
						$request->file('logo')->move($uploadpath, $image);
					}
					$value = $image;
				} else {
					$value = $request->image_bk;
				}
			}
           
            Setting::updateOrCreate(['option_name' => $key], [
                'option_name' => $key,
                'option_value' => $value,
            ]);
		}
		return back()->withInput(array('msg' => 'Setting Updated Successfully'));
	}

    public function headerSetting()
	{
		$settingData = Setting::get();
		return view('admin.settings.headerSetting', compact('settingData'));
	}

    public function headerSettingUpdate(Request $request)
	{
		$request->request->remove('_token'); // to remove property from $request
		$input = $request->all();
		foreach ($input as $key => $value) {
			Setting::updateOrCreate(['option_name' => $key], [
                'option_name' => $key,
                'option_value' => $value,
            ]);
		}
		return back()->withInput(array('msg' => 'Setting Updated Successfully'));
	}

    public function footerSetting()
	{
		$settingData = Setting::get();
		return view('admin.settings.footerSetting', compact('settingData'));
	}

	public function footerSettingUpdate(Request $request)
	{
		$request->request->remove('_token'); // to remove property from $request
		$input = $request->all();
		foreach ($input as $key => $value) {
			Setting::updateOrCreate(['option_name' => $key], [
                'option_name' => $key,
                'option_value' => $value,
            ]);
		}
		return back()->withInput(array('msg' => 'Setting Updated Successfully'));
	}
}
