<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
	{
		return view('admin.profile.index');
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => [
                'nullable', 
                'string',
                'min:8',
                'same:confirm-password',
                'regex:/[a-z]/',     
                'regex:/[A-Z]/',      
                'regex:/[0-9]/',      
                'regex:/[@$!%*?&]/',  
            ],
        ]);
        $input = $request->all();


     
        if ($request->hasFile('profile_image')) {
            $image_prefix = 'profile_pic_' . rand(0, 999999999) . '_' . date('d_m_Y_h_i_s');
            $ext = $request->file('profile_image')->getClientOriginalExtension();
            $imageName = $image_prefix . '.' . $ext;
        
            $filePath = $request->file('profile_image')->storeAs('profile_images', $imageName, 'public');
        
            // Save path relative to the "public" disk
            $input['profile_image'] = $filePath;
        } else {
            $input = Arr::except($input, ['profile_image']);
        }
        
    
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }
    
        $user = User::find($id);
        $user->update($input);
    
        session()->flash('success', 'Profile updated successfully');

        return redirect()->route('admin.profile');
        
    }
}
