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
        'password' => [ 'nullable', 'string', 'min:8', 'same:confirm-password', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*?&]/', ],
        ]);


        if ($request->hasFile('profile_pic')) {
            $image = '';
            $uploadpath = public_path().'/images/profile_pic';
            $request->file('profile_pic')->getClientOriginalName();
            if (!empty($request->file('profile_pic'))) {
                $image_prefix = 'profile_pic_' . rand(0, 999999999) . '_' . date('d_m_Y_h_i_s');
                $ext = $request->file('profile_pic')->getClientOriginalExtension();
                $image = $image_prefix . '.' . $ext;
                $request->file('profile_pic')->move($uploadpath, $image);
            }
        } else {
            $value = $request->profile_pic_bk;
        }
    
        $input = $request->all();
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
