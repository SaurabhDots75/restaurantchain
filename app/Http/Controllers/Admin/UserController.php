<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash , Auth;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $query = User::query();
        $searchVariable = [];
    
        $query->whereDoesntHave('roles', function ($q) {
            $q->where('name', 'Admin');
        });
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
    
        $data = $query->latest()->paginate(10);
        $roles = Role::whereNot('name','Super Admin')->whereNot('name','Admin')->pluck('name','name')->all();
    
        return view('admin.users.index', compact('data', 'searchVariable' ,'roles'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::whereNot('name','Super Admin')->whereNot('name','Admin')->pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',          // Minimum length of 8 characters
                'same:confirm-password', // Ensure it matches the confirm-password field
                'regex:/[a-z]/',  // must contain at least one lowercase letter
                'regex:/[A-Z]/',  // must contain at least one uppercase letter
                'regex:/[0-9]/',  // must contain at least one digit
                'regex:/[@$!%*?&]/'// must contain at least one special character
            ],
            'roles'    => 'required|array',
        ]);
       if ($validator->fails()) { return redirect()->back() ->withErrors($validator) ->withInput(); }


       
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('admin.users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('admin.users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::whereNot('name','Super Admin')->whereNot('name','Admin')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
        return redirect()->route('admin.users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $recordId = $request->input('id');
        // Perform deletion logic, e.g., delete from database
        $record = User::find($recordId);
        if ($record) {
            $record->delete();
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false, 'message' => 'Record not found'], 404);
    }
}
