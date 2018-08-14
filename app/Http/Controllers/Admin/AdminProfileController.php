<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Storage;
class AdminProfileController extends Controller
{
    public function index() {

    	$admin = Admin::find(auth()->guard('admin')->user()->id); 

    	return view('admin.profile.index', compact('admin'));
    }

     public function edit() {

    	$admin = Admin::find(auth()->guard('admin')->user()->id); 

    	return view('admin.profile.edit', compact('admin'));
    }

    public function update($id) {
    	$data = $this->validate(request(),[
            'name'     => 'required|min:3',
            'email'    => 'required|unique:admins,email,'.$id,
            'password' => 'sometimes|nullable|min:8',
            'photo'    => 'image|mimes:jpg,jpeg,png',
        ]);
    	  if(!empty(request('password'))) {
            $data['password'] = bcrypt(request('password'));
         } else {
            $data['password'] = request('old_password');
         }

    	 if(request()->hasFile('photo')) {
    	 	!empty(auth()->guard('admin')->user()->photo) ? Storage::delete(auth()->guard('admin')->user()->photo) : '';

    	 	$data['photo'] = request()->file('photo')->store('admins');
    	 }

    	Admin::find($id)->update($data);

    	return redirect()->route('admin.profile');
    }
}
