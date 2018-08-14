@extends('site.app')
@push('js')
<script>
$(function(){
			$("#item_type_id option").hide();
	$("#item_type_id option:first").show();

	$('#main_item_type_id').on('change', function(){
	var main = $('#main_item_type_id').val();
	//var item_type_id = $('#item_type_id').val();
	$("#item_type_id option").hide();
	$("#item_type_id option:first").show();
	$('option.category_'+main).show();
	});
});
</script>
@endpush
@section('title')
{{ config('app.name') }}
@endsection
@section('content')
<div class="container">
 	<form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="get">
        @csrf
      <input class="form-control mr-sm-2" name="name" type="search" placeholder="Search" aria-label="Search">
       <select name="city" class="form-control" id="main_item_type_id">
        <option value="">choose</option>
        <option value="القاهره">القاهره</option>
        <option value="المنصوره">المنصوره</option>
        <option value="الدقهليه">الدقهليه</option>
  
    </select>
     <select name="location" class="form-control" id="item_type_id-disabeld-now">
        <option value="" class="">choose</option>
        <option value="اجا" class="category_1">اجا</option>
        <option value="اجا" class="category_1">اجا</option>
        <option value="اجا" class="category_2">اجا</option>
        <option value="مكان" class="category_2">مكان</option>
        <option value="مكان" class="category_2">مكان</option>
        <option value="مكان" class="category_3">مكان</option>
        <option value="مكان" class="category_3">مكان</option>
        <option value="12" class="category_3">cat 3</option>
        <option value="13" class="category_4">cat 4</option>
        <option value="13" class="category_4">cat 4</option>
        <option value="13" class="category_4">cat 4</option>
    </select>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="row">
    @foreach($items as $item)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="{{ Storage::url($item->photo) }}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <span>القسم: {{ $item->cats->cat_name }}</span>
                    <p class="card-text">الوصف :{{ $item->description }}</p>
                    <a href="{{ url('item/'.$item->slug) }}" class="btn btn-primary">read more</a>
                  </div>
                </div>
            </div>
    @endforeach
        </div>
        </div>

@endsection