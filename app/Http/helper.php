<?php
	
	if(!function_exists('load_cat')) {
		function load_cat($select=null,$cat_id=null) {
			$categories = \App\Category::selectRaw('cat_name as name')
							             ->selectRaw('id as id')
							             ->selectRaw('parent_id as parent')
							             ->get(['name','id,parent']);

			$cat_arr = [];
			foreach($categories as $category) {
					$list_arr = [];
					$list_arr['icon'] = '';
					$list_arr['li_attr'] = '';
					$list_arr['a_attr'] = '';
				if($select !== null and $select == $category->id) {
					$list_arr['state'] = [
						'opened' => true,
						'selected'=>true,
					];
				}
				if($cat_id !== null and $cat_id == $category->id) {
					$list_arr['state'] = [
						'opened' => true,
						'selected'=>true,
						'hidden' => true
					];
				}
				$list_arr['id'] = $category->id;
				$list_arr['parent'] = $category->parent !== null ? $category->parent : '#';
				$list_arr['text'] = $category->name;
				array_push($cat_arr,$list_arr);
			}
			return json_encode($cat_arr,JSON_UNESCAPED_UNICODE);
		}		
	}

	if(!function_exists('settings')) { 

		function settings() {
			return \App\Settings::first();
		}
	}

	if(!function_exists('adminauth')) {
		function adminauth(){
			return auth()->guard('admin')->user();
		}
	}