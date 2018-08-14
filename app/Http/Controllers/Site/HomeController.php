<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
class HomeController extends Controller
{
    public function index() {
    	$items = Item::with('cats')->get();
    	return view('site.home',compact('items'));
    }
  
}
