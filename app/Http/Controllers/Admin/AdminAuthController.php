<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    public function login() {
    	return view('admin.auth.login');
    }

    public function do_login() {
    	$this->validate(request(),[
    		'email'    => 'required|email',
    		'password' => 'required'
    	]);

    	$remember = request('remember') ? true : false;

    	if(auth()->guard('admin')->attempt(['email'=>request('email'),'password'=>request('password')],$remember)) {
    		return redirect()->intended('admin');
    	} else {
    		return redirect()->route('admin.login');
    	}
    }

    public function logout() {
        auth()->guard('admin')->logout();

        return redirect()->route('admin.login'); 
    }
}
