@extends('site.app')
@section('title')
Edit Item
@endsection
@push('js')
<script>
$(function () { 
	$('#jstree').jstree({
		"core" : {
			'data' : {!! load_cat($item->cats->id) !!},
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
<form action="{{ route('item.update',$item->id) }}" role="form" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<label for="">Name</label>
		<input type="text" name="name" class="form-control" value="{{ $item->name }}">
		<label for="">Descriptsion</label>
		<textarea name="description" class="form-control">{{ $item->description }}</textarea>
		<div id="jstree"></div>
		<input type="file" name="photo" class="form-control" value="{{ old('photo') }}">
		<input type="hidden" class="category_id" name="category_id">
		<label for="">City</label>
		<input type="text" name="city" class="form-control" value="{{ $item->city}}">
		<label for="">Location</label>
		<input type="text" name="location" class="form-control" value="{{ $item->location }}">
		<label for="">Price</label>
		<input type="number" name="price" class="form-control" value="{{ $item->price }}">
		<label for="">space</label>
		<input type="number" name="space" class="form-control" value="{{ $item->space }}">
		<label for="">Rooms</label>
		<input type="number" name="rooms" class="form-control" value="{{ $item->rooms }}">
		<label for="">Pathrooms</label>
		<input type="number" name="pathroom" class="form-control" value="{{ $item->pathroom }}">
		<label for="">FLat</label>
		<input type="number" name="flat" class="form-control" value="{{ $item->flat }}">
		<label for="">Takseet</label>
		<select class="form-control" name="takseet">
			<option value="نعم" {{ $item->takseet == 'نعم' ? 'selected': '' }}>نعم</option>
			<option value="لا" {{ $item->takseet == 'لا' ? 'selected': '' }}>لا</option>
		</select>
		<label for="">Tashteeb</label>
		<select class="form-control" name="tashteeb">
			<option value="نعم" {{ $item->tashteeb == 'نعم' ? 'selected': '' }} >نعم</option>
			<option value="لا" {{ $item->tashteeb == 'لا' ? 'selected': '' }}  >لا</option>
		</select class="form-control">
		<label for="">Tajeer</label>
		<select class="form-control" name="tajeer">
			<option value="نعم" {{ $item->tajeer == 'نعم' ? 'selected': '' }}>نعم</option>
			<option value="لا" {{ $item->tajeer == 'لا' ? 'selected': '' }}>لا</option>
		</select>
 	 <input type="submit" value="Update" class="btn btn-primary">
 	 <a href="{{ route('items.index') }}" class="btn btn-danger">Cancel</a>
</form>

@if(!empty($errors->all()))
	<ul class="list-group">
	@foreach($errors->all() as $error)
		<li class="list-group-item">{{ $error }}</li>
	@endforeach
	</ul>
@endif
</div>
@endsection
