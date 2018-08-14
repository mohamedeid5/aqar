@extends('site.app')
@section('title')
{{ $cat->cat_name }}
@endsection
@section('content')
<div class="container">
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