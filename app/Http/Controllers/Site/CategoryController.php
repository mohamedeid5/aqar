<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Item;
class CategoryController extends Controller
{
    public function show($slug) {
    	$cat   = Category::where('slug',$slug)->first();
    	$items = Item::where('category_id',$cat->id)->get();
    	return view('site.category.show',compact('cat','items'));
    }
}
