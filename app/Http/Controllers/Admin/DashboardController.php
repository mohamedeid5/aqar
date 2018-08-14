<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class DashboardController extends Controller
{
    
    public function home() {
    	$items       = $this->allItem();
    	$users       = $this->allUsers();
    	$categories  = $this->allCategories();
        $latestUsers = $this->latestUsers();
        $latestItems = $this->latestItems();
        return view('admin.home',compact('latestUsers','latestItems','items','users','categories'));
    }

    public function latestUsers() {
        $latestUsers = DB::table('users')->take(5)->orderBy('created_at','desc')->get();
        return $latestUsers;
    }

    public function latestItems() {
        $latestUsers = DB::table('items')->take(5)->orderBy('created_at','desc')->get();
        return $latestUsers;
    }

    public function allItem() {
    	$items = DB::table('items')->count();
    	return $items;
    } 

    public function allUsers() {
    	$users = DB::table('users')->count();
    	return $users;
    }

    public function allCategories() {
    	$categories = DB::table('categories')->count();
    	return $categories;
    }
}
