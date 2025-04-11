<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash, Auth;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageUpload;

class UserController extends Controller
{
    use ImageUpload;
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
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
            $q->where('name', 'Super Admin');
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

        $query = $query->orderBy('created_at', 'desc');

        $data = $query->paginate($request->input('per_page', 10));

        $roles = Role::whereNot('name', 'Super Admin')->whereNot('name', 'Admin')->pluck('name', 'name')->all();

        return view('admin.users.index', compact('data', 'searchVariable', 'roles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {

        $restaurants = Restaurant::where('is_active', 1)->get();
        $roles = Role::whereNot('name', 'Super Admin')->whereNot('name', 'Admin')->pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles', 'restaurants'));
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
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'password'      => [
                'required',
                'string',
                'min:8',
                'same:confirm-password',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/',
            ],
            'roles'         => 'required|array',
            'address'       => 'required',
            'phone'         => 'required|string|max:15', // Add validation for phone
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048', // Add validation for profile image
        ]);

        $validator->sometimes('restaurant_id', 'required|exists:restaurants,id', function ($input) {
            $roles = is_array($input->roles) ? $input->roles : [];
            return in_array('Restaurant', $roles) || in_array('Kitchen', $roles);
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']); // Hash the password

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $input['profile_image'] = $imagePath; // Store the file path in the database
        }

        $user = User::create($input);

        // Assign roles to the user
        $user->assignRole($request->input('roles'));

        // Redirect back with a success message
        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully');
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
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find(base64_decode($id));
        $restaurants = Restaurant::where('is_active', 1)->get();

        $roles = Role::whereNot('name', 'Super Admin')->whereNot('name', 'Admin')->pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.users.edit', compact('user', 'roles', 'userRole', 'restaurants'));
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
        $user = User::findOrFail($id);
    
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'roles'         => 'required|array',
            'address'       => 'required',
            'phone'         => 'required|string|max:15',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048',
        ]);
    
        $validator->sometimes('restaurant_id', 'required|exists:restaurants,id', function ($input) {
            $roles = is_array($input->roles) ? $input->roles : [];
            return in_array('Restaurant', $roles) || in_array('Kitchen', $roles);
        });
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $input = $request->all();
    
    
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $input['profile_image'] = $imagePath;
        } else {
            $input = Arr::except($input, ['profile_image']);
        }
    
        $user->update($input);
    
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully');
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
