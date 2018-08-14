@extends('admin.app')
@section('title')
Create Category
@endsection
@push('js')
<script>
$(function () { 
	$('#jstree').jstree({
		"core" : {
			'data' : {!! load_cat($cat->parent_id,$cat->id) !!},
		"themes" : {
		"variant" : "large"
	}
	},
		
		"plugins" : [ "wholerow" ]
	});
	$('#jstree').on("changed.jstree",function(e, data){
		var i,j,r = [];
		for(i=0,j=data.selected.length;i < j;i++) {
			r.push(data.instance.get_node(data.selected[i]).id);
		}
		$('.parent_id').val(r.join(', '));
	});	
 });
</script>
@endpush
@section('content')
<form action="{{ route('categories.update',$cat->id) }}" role="form" method="post">
	@csrf
	@method('put')
	<div class="form-group">
	    <label for="">Category Name</label>
	    <input type="text" class="form-control" name="cat_name" value="{{ $cat->cat_name }}">
 	 </div>
 	 <input type="hidden" name="parent_id" class="parent_id" value="{{ $cat->parent_id }}">
 	  <div id="jstree"></div>
 	 <div class="form-group">
	    <label for="">Description</label>
	    <input type="text" class="form-control" name="description" value="{{ $cat->description }}">
 	 </div>
 	 <div class="form-group">
	    <label for="">keywords</label>
	    <input type="text" class="form-control" name="keywords" value="{{ $cat->keywords }}">
 	 </div>
 	 <input type="submit" value="Update" class="btn btn-primary">
 	 <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancel</a>
</form>
@if(!empty($errors->all()))
	<ul class="list-group">
	@foreach($errors->all() as $error)
		<li class="list-group-item">{{ $error }}</li>
	@endforeach
	</ul>
@endif
@endsection