<?php

Route::group(['prefix' => 'admin','namespace'=>'Admin'], function() {
    
	Route::group(['middleware' => 'admin:admin'], function() {

	    Route::get('/', 'DashboardController@home')->name('admin.home');
	    //logout route
	    Route::get('logout', 'AdminAuthController@logout')->name('admin.logout');
	    // admins route
		Route::resource('/admins', 'AdminsController');
		// route for multi delete admin
		Route::post('/admins/delete','AdminsController@delete_all')->name('admins.all');
		//users
		Route::resource('/users', 'UsersController');
		// route for multi delete admin
		Route::post('/users/delete','UsersController@delete_all')->name('users.all');
		// categories routes
		Route::resource('/categories', 'CategoryController');
		// items route
		Route::resource('/items', 'ItemController');
		// multi delete route
		Route::post('/items/delete','ItemController@delete_all')->name('items.all');
		Route::get('items/{id}/approve', 'ItemController@approve')->name('items.approve');
		// settings route
		Route::get('settings', 'SettingsController@settings')->name('admin.settings');
		// save settings route
		Route::post('settings', 'SettingsController@settings_save')->name('admin.settings.save');
		// admin profile
		Route::get('profile', 'AdminProfileController@index')->name('admin.profile'); 
		// edit profile route
		Route::get('profile/{id}/edit', 'AdminProfileController@edit')->name('admin.profile.edit'); 
		// update profile route
		Route::post('profile/{id}', 'AdminProfileController@update')->name('admin.profile.update'); 
	});

	// admin login route
	Route::get('/login', 'AdminAuthController@login')->name('admin.login');
	// admin do login route
	Route::post('/login', 'AdminAuthController@do_login')->name('admin.do.login');
});

// user routes

Route::get('/', 'Site\HomeController@index')->name('home');

// items routes
Route::group(['middleware' => 'auth'], function() {

	Route::resource('profile', 'User\ProfileController');
});

	Route::resource('item','Site\ItemController');
	Route::get('item/{slug}','Site\ItemController@show');
	Route::get('search','Site\ItemController@search')->name('search');
	Route::get('category/{id}','Site\CategoryController@show')->name('category');


// user auth routes

Route::get('login','User\UserAuthController@login')->name('login');
Route::post('login','User\UserAuthController@do_login')->name('user.do.login');

Route::get('register','User\UserAuthController@register')->name('register');
Route::post('register','User\UserAuthController@do_register')->name('do.register');
Route::any('logout','User\UserAuthController@logout')->name('logout');
