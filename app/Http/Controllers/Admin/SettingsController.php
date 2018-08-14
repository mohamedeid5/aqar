<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;
use Storage;

class SettingsController extends Controller
{
    public function settings() {

    	return view('admin.settings.settings');
    }

    public function settings_save() {
    	$data = $this->validate(request(),[
    		'site_name_ar' => 'required',
    		'site_name_en' => 'required',
    		'icon' 		   => 'image|mimes:jpg,jpeg,png',
    		'lang'         => 'required',
    		'status'	   => 'required',
    	]);
    	if(request()->hasFile('icon')) {

    		!empty(Settings::first()->icon) ? Storage::delete(Settings::first()->icon) : '';

    		$data['icon'] = request()->file('icon')->store('settings');
    	}
        
    	Settings::orderBy('id','desc')->update($data);

    	return back();
    }
}
