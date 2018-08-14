@extends('site.app')
@section('title')
Create Item
@endsection
@push('js')
<script>
$(function () { 

	$('#jstree').jstree({
		"core" : {
			'data' : {!! load_cat() !!},
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
		$('.category_id').val(r.join(', '));
		
	});

 });
</script>
@endpush
@section('content')
	<div class="container">
	<form action="{{ route('item.store') }}" method="post" class="form-group item-admin" enctype="multipart/form-data">
		@csrf
		<label for="">Name</label>
		<input type="text" name="name" class="form-control">
		<label for="">Descriptsion</label>
		<textarea name="description" class="form-control"></textarea>
		<div id="jstree"></div>
		<input type="file" name="photo" class="form-control" value="{{ old('photo') }}">
		<input type="hidden" class="category_id" name="category_id">
		<label for="">City</label>
		<input type="text" name="city" class="form-control" value="{{ old('city') }}">
		<label for="">Location</label>
		<input type="text" name="location" class="form-control" value="{{ old('location') }}">
		<label for="">Price</label>
		<input type="number" name="price" class="form-control" value="{{ old('price') }}">
		<label for="">space</label>
		<input type="number" name="space" class="form-control" value="{{ old('space') }}">
		<label for="">Rooms</label>
		<input type="number" name="rooms" class="form-control" value="{{ old('rooms') }}">
		<label for="">Pathrooms</label>
		<input type="number" name="pathroom" class="form-control" value="{{ old('pathroom') }}">
		<label for="">FLat</label>
		<input type="number" name="flat" class="form-control" value="{{ old('flat') }}">
		<label for="">Takseet</label>
		<select class="form-control" name="takseet" value="{{ old('takseet') }}"> 
			<option value="نعم">نعم</option>
			<option value="لا">لا</option>
		</select>
		<label for="">Tashteeb</label>
		<select class="form-control" name="tashteeb" value="{{ old('tashteeb') }}">
			<option value="نعم">نعم</option>
			<option value="لا">لا</option>
		</select class="form-control">
		<label for="">Tajeer</label>
		<select class="form-control" name="tajeer" value="{{ old('tajeer') }}">
			<option value="نعم">نعم</option>
			<option value="لا">لا</option>
		</select>
		<input type="submit" value="Add" class="btn btn-primary">
	</form>

@if(!empty($errors->all()))
	<ul class="list-group">
	@foreach($errors->all() as $error)
		<li class="list-group-item">{{ $error }}</li>
	@endforeach
	</ul>
@endif
@endsection
</div>
