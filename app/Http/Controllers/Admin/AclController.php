<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Config;
use App\Models\Acl;
use App\Models\AclAdminAction;
use App\Models\AclDescription;
use App\Models\Language;
use Spatie\Permission\Models\Permission;

class AclController extends Controller
{
	// public $model =	'acl';
	// public function __construct(Request $request)
	// {	
	// 	parent::__construct();
	// 	View()->share('model', $this->model);
	// }



    public function index(Request $request)
    {
        $query = Acl::query();
        $searchVariable = [];
    
        $searchData = $request->except(['display', '_token', 'order', 'sortBy', 'page']);
    
        foreach ($searchData as $fieldName => $fieldValue) {
            if (!empty($fieldValue)) {
                if ($fieldName == "name") {
                    $query->where("name", 'like', '%' . $fieldValue . '%');
                } elseif ($fieldName == "email") {
                    $query->where("email", 'like', '%' . $fieldValue . '%');
                } elseif ($fieldName == "role") {
                    $query->whereHas('roles', function ($q) use ($fieldValue) {
                        $q->where('name', $fieldValue);
                    });
                }
    
                $searchVariable[$fieldName] = $fieldValue;
            }
        }
        $parent_list 	= 	Acl::get();
        $modules = $query->latest()->paginate(10);
    
        return view('admin.acl.index', compact( 'parent_list','modules', 'searchVariable'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }



	public function create()
	{
		$parent_list =  Acl::get();
		return View("admin.acl.add", compact('parent_list'));
	}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'required|numeric',
            'route' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            // 'permissions.*.name' => 'required_with:permissions.*.function_name|string|max:255',
            // 'permissions.*.function_name' => 'required_with:permissions.*.name|string|max:255',
        ]);
    
        $acl = new Acl();
        $acl->title = $request->title;
        $acl->route = $request->route;
        $acl->icon = $request->icon;
        $acl->parent_id = $request->parent_id ?? 0;
        $acl->order = $request->order;
        $acl->is_active = $request->is_active ?? 1;
        $acl->save();
    
        if ($request->has('permissions')) {
            foreach ($request->permissions as $perm) {
                if (!empty($perm['name']) && !empty($perm['function_name'])) {
                    AclAdminAction::create([
                        'admin_module_id' => $acl->id,
                        'name' => $perm['name'],
                        'function_name' => $perm['function_name'],
                    ]);
                    Permission::firstOrCreate(['name' => $perm['name']]);
                }
            }
        }
    
        session()->flash('success', 'Module and permissions created successfully.');
    
        return redirect()->route('admin.acl.index');
    }
    

    public function edit($id)
    {

        $acl = Acl::with('permissions')->findOrFail(base64_decode($id));
        $parent_list = Acl::where('parent_id', 0)->where('id', '!=', $id)->get();
    
        return view('admin.acl.edit', compact('acl', 'parent_list'));
    }
	public function update(Request $request, $id)
        {

            // dd($request->all());

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'order' => 'required|numeric',
                'route' => 'nullable|string|max:255',
            ]);
            // Update ACL module
            $acl = Acl::findOrFail($id);
            $acl->title = $request->title;
            $acl->route = $request->route;
            $acl->icon = $request->icon;
            $acl->parent_id = $request->parent_id ?? 0;
            $acl->order = $request->order;
            $acl->is_active = $request->is_active ?? 1;
            $acl->save();

            // Track existing permission function names
            $existingActions = AclAdminAction::where('admin_module_id', $acl->id)->pluck('id', 'function_name')->toArray();
            $sentActions = [];

            if ($request->has('permissions')) {
                foreach ($request->permissions as $perm) {
                    if (!empty($perm['name']) && !empty($perm['function_name'])) {
                        $sentActions[] = $perm['function_name'];

                        // Update or create AclAdminAction
                        $action = AclAdminAction::updateOrCreate(
                            [
                                'admin_module_id' => $acl->id,
                                'function_name' => $perm['function_name']
                            ],
                            [
                                'name' => $perm['name']
                            ]
                        );

                        // Also update/create in Spatie permissions table
                        \Spatie\Permission\Models\Permission::updateOrCreate(
                            ['name' => $perm['name']],
                            ['guard_name' => 'web']
                        );
                    }
                }
            }

            // Remove actions not present in updated list
            foreach ($existingActions as $funcName => $actionId) {
                if (!in_array($funcName, $sentActions)) {
                    // Delete from AclAdminAction
                    AclAdminAction::find($actionId)->delete();
                }
            }

            session()->flash('success', 'Module and permissions updated successfully.');
            return redirect()->route('admin.acl.index');
        }
        public function delete($id)
        {
            $acl = Acl::find($id);
            if (!$acl) {
                return redirect()->route('admin.acl.index')->with('error', 'ACL entry not found.');
            }
    
            // if ($acl->permissions()->count() > 0) {
            //     return redirect()->route('admin.acl.index')->with('error', 'Cannot delete ACL entry with associated permissions.');
            // }
    
            $acl->delete();
    
            return redirect()->route('admin.acl.index')->with('success', 'ACL entry deleted successfully.');
        }


        public function show($id)
{
    $acl = Acl::find($id);

    if (!$acl) {
        return redirect()->route('admin.acl.index')->with('error', 'ACL entry not found.');
    }

    return view('admin.acl.show', compact('acl'));
}

	public function changeStatus($modelId = 0, $status = 0)
	{
		if ($status == 1) {
			$statusMessage   =   " Module deactivated successfully";
		} else {
			$statusMessage   =   " Module activated successfully";
		}
		$user = Acl::find($modelId);
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
