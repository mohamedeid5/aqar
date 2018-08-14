<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = 'items';
	
	protected $fillable = [
		'name','slug','description','price','city','location','code','user_id','category_id',
		'space','rooms','pathroom','flat','takseet','tashteeb','tajeer','status','photo',
	];

	public function cats() {
    	return $this->belongsTo(Category::class,'category_id');
	}
	
	
}
