<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserAuthController extends Controller
{
    public function login() {
    	return view('site.auth.login');
    }

    public function do_login() {

    	$this->validate(request(),[
    		'email'    => 'required|email',
    		'password' => 'required'
    	]);
    	$remember = request('remember') ? true : false;
    	if(auth()->attempt(['email'=>request('email'),'password'=>request('password')],$remember)) {
    		return redirect()->intended('/');
    	} else {
    		return redirect('login');
    	}
    }

     public function register() {
        return view('site.auth.register');
     }

    public function do_register() {
        $data = $this->validate(request(),[
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:6',
            'agree'     => 'required',
        ]);

        $data['password'] = bcrypt(request('password'));

        User::create($data);

        return redirect('/');
    }

    public function logout() {
        auth()->logout();

        return redirect()->route('home');
    }
}
