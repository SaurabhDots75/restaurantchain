<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lookup;
use App\Models\LookupDiscription;
use App\Models\Language;
use DB;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class LookupsController extends Controller
{
   

    public function index(Request $request, $type)
    {
        $query = Lookup::query();

        if ($request->has('code')) {
            $query->where('code', 'like', '%' . $request->input('code') . '%');
        }

        $sortBy = $request->get('sortBy', 'created_at');
        $order = $request->get('order', 'desc');
        $query_string = $request->query();

        $results = $query->orderBy($sortBy, $order)->paginate(10);

        return view('admin.lookup.index', compact('results', 'sortBy', 'order', 'query_string', 'type'));
    }


    public function add(Request $request, $type = null)
    {
        return  View("admin.lookup.add", compact('type'));
    }


    public function store(Request $request, $type = null)
    {
        
        $validator = Validator::make(
            $request->all(),
            [
                'code' => 'required|unique:lookups,name', // Correct validation rule
            ],
            [
                'code.required' => trans("The code field is required."),
                'code.unique' => trans("The code must be unique."),
            ]
        );
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    

            $lookups = new Lookup();
            $lookups->name = $request->code; 
            $lookups->lookup_type = $type;
            $lookups->save();
            return redirect()->route('admin.lookup.index', $type)->with('success', 'Staff created successfully');
        
    }
    public function update(Request $request, $type, $enlokid)
    {

        $look_id = '';
        if (!empty($enlokid)) {
            $look_id = base64_decode($enlokid);
        } else {
            return Redirect()->back();
        }

        if ($request->isMethod('POST')) {
            $thisData                    =    $request->all();
            $default_language            =    Config('constants.DEFAULT_LANGUAGE.FOLDER_CODE');
            $language_code                 =   Config('constants.DEFAULT_LANGUAGE.LANGUAGE_CODE');
            $dafaultLanguageArray        =    $thisData['data'][$language_code];
            if (!empty($type == 'skills')) {
                Validator::extend('unique_skills', function ($attribute, $value, $parameters) use ($look_id) {
                    $getinfo  =   DB::table('lookups')->where("lookup_type", 'skills')->where("code", $value)->where('id', '!=', $look_id)->where("is_active", 1)->first();
                    if (!empty($getinfo)) {
                        return false;
                    } else {
                        return true;
                    }
                });
                $validator = Validator::make(
                    array(
                        'code'              => $dafaultLanguageArray['code'],
                        'lookup_type'       =>  $type,
                    ),
                    array(
                        'code'              => 'required|unique_skills',
                    ),
                    array(
                        "code.required"        => trans("The skills field is required."),
                        "code.unique_skills"   => trans("The skills must be unique."),
                    )
                );
            } else {
                $validator = Validator::make(
                    array(
                        'code'              => $dafaultLanguageArray['code'],
                        'lookup_type'       =>  $type,
                    ),
                    array(
                        'code'              => 'required',
                    ),
                );
            }
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $lookups =  Lookup::find($look_id);
                $lookups->code                            = $dafaultLanguageArray['code'];
                $lookups->lookup_type                    =     $type;
                $lookups->save();
                $lookupsId                                =    $lookups->id;
                if (!$lookupsId) {
                    Session()->flash('error', trans("Something went wrong."));
                    return Redirect()->back()->withInput();
                }
                LookupDiscription::where('parent_id', '=', $lookupsId)->delete();
                foreach ($thisData['data'] as $language_id => $value) {
                    $lookupDescription_obj                    =  new LookupDiscription();
                    $lookupDescription_obj->language_id        =    $language_id;
                    $lookupDescription_obj->parent_id        =    $lookupsId;
                    $lookupDescription_obj->code             =    $value['code'];
                    $lookupDescription_obj->save();
                }

                Session()->flash('flash_notice', trans(ucfirst($type) . " updated successfully"));
                return Redirect()->route($this->model . '.index', $type);
            }
        }

        $lookups =  Lookup::find($look_id);
        $LookupDescription    =    LookupDiscription::where('parent_id', $look_id)->get();
        $multiLanguage             =    array();
        if (!empty($LookupDescription)) {
            foreach ($LookupDescription as $description) {
                $multiLanguage[$description->language_id]['code'] =    $description->code;
            }
        }
        $languages = Language::where('is_active', 1)->get();
        $language_code = Config('constants.DEFAULT_LANGUAGE.LANGUAGE_CODE');

        return  View("admin.$this->model.edit", array('lookups' => $lookups, 'type' => $type, 'languages' => $languages, 'language_code' => $language_code, 'multiLanguage' => $multiLanguage));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($enlokid)
    {
        $look_id = '';
        if (!empty($enlokid)) {
            $look_id = base64_decode($enlokid);
        } else {
            return Redirect()->back();
        }
        $type =  Lookup::find($look_id)->value('lookup_type');
        Lookup::find($look_id)->delete();
        LookupDiscription::where("parent_id", $look_id)->delete();
        Session()->flash('flash_notice', trans(ucfirst($type) . " has been removed successfully"));
        return back();
    }

    public function changeStatus($modelId = 0, $status = 0)
    {
        $type =  Lookup::find($modelId)->value('lookup_type');
        if ($status == 1) {
            $statusMessage   =   trans(ucfirst($type) . " has been deactivated successfully");
        } else {
            $statusMessage   =  trans(ucfirst($type) .  " has been activated successfully");
        }
        $user = Lookup::find($modelId);
        if ($user) {
            $currentStatus = $user->is_active;
            if (isset($currentStatus) && $currentStatus == 0) {
                $NewStatus = 1;
            } else {
                $NewStatus = 0;
            }
            $user->is_active = $NewStatus;
            $ResponseStatus = $user->save();
        }
        Session()->flash('flash_notice', $statusMessage);
        return back();
    }
}
