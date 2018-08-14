<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';

    protected $fillable = [
        'cat_name', 'slug','description', 'keywords', 'icon', 'parent_id',
    ];

    public function parents() {
    	return $this->hasMany(Category::class,'parent_id');
    }

    public function children() {
    	return $this->belongsTo(Category::class,'parent_id');
    }

    public function items() {
    	return $this->hasMany(Item::class);
    }
}
