

	$('#item_type_id option').hide();
	$('#item_type_id option:first').show();
	$('#main_item_type_id').on('change', function(){
		var main = $('#main_item_type_id').val();
		$("#item_type_id option").hide();
		$("#item_type_id option:first").show();
		$('#item_type_id option.main_type'+main).show();
	});
<select name="" id="main_item_type_id" class="form-control">
			 <option value="" class="">choose</option>
			@foreach($cats as $cat)
			@if(empty($cat->parent_id))
			<option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
			@endif
			@endforeach
		</select>
		<label for="">type 2</label>
		<select name="" id="item_type_id" class="form-control">
			@foreach($cats as $cat)
			@if(!empty($cat->parent_id))
			 <option value="" class="">choose</option>
			<option value="{{ $cat->id }}" class="main_type{{ $cat->parent_id }}">{{ $cat->cat_name }}</option>
			@endif
			@endforeach
		</select>