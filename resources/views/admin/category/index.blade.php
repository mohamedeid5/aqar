@extends('admin.app')
@section('title')
Categories
@endsection
@push('js')
<script>
$(function () { 
	$('#jstree').jstree({
		"core" : {
			// get data from helper function helper.php
			'data' : {!! load_cat(old('parent_id')) !!},
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
		// get id
		$('.parent_id').val(r.join(''));
		// confirm event to cahnge url, delete and submit
		$('.delete_cat').on('click',function(){
			// confirm to delete - if true delete else false
			if(confirm('are you srue?') == true){
				var id = r.join('');
				// :id => route id
				var url = "{{ route('categories.destroy', ':id') }}";
				// replace :id to id
				url = url.replace(':id',id);
				//set form action 
				$('#form_delete_cat').attr('action',url);
				// after that submit form
				$('#form_delete_cat').submit();
			} else {
				// don't do any thing
				return;
			}
			
		});
		if(r.join('') != '') {
			$('.showbtn-control').removeClass('hidden');
			// get node id
			var id = r.join('');
			// :id => route id
			var url = "{{ route('categories.edit', ':id') }}";
			// replace :id to id
			url = url.replace(':id',id);
			// href = url
			var url = $('.edit_cat').attr('href',url);

		} else {
			$('.showbtn-control').addClass('hidden');
		}	
	});	
 });
</script>
@endpush
@section('content')
<a href="{{ route('categories.create') }}" class="btn btn-info">Add Category</a>
<a href="" class="btn btn-primary edit_cat showbtn-control hidden"><i class="fa fa-edit"> Edit</i></a>
<button class="btn btn-danger delete_cat showbtn-control hidden"><i class="fa fa-trash"> Delete</i></button>
 <div id="jstree"> </div>
 	<input type="hidden" name="parent_id" class="parent_id" value="">
 	<form action="" method="post" id="form_delete_cat">
	@csrf
	@method('delete')
</form>
@endsection