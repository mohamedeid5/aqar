@extends('site.app')
@section('title')
Your Items
@endsection
@section('content')
<div class="container">
<h1>Items</h1>
<div class="row">
@foreach($items as $item)
	<div class="col-3">
	  <div class="card" style="width: 18rem;">
	  	<img class="card-img-top" src="{{ Storage::url(\App\Item::find($item->id)->photo) }}" alt="Card image cap">
	  <div class="card-body">
	    <h5 class="card-title">{{ $item->name }}</h5>
	    <h6 class="card-subtitle mb-2 text-muted">{{ date('d, M g:i A',strtotime($item->created_at)) }}</h6>
	    <p class="card-text">{{ $item->description }}</p>
	    <a href="{{ route('item.edit',$item->id) }}" class="card-link btn btn-primary">Edit</a>
	    <form action="{{ route('item.destroy',$item->id) }}" method="post">
	    	@csrf
	    	@method('delete')
	    	<button class="card-link btn btn-danger">Delete</button>
	    </form>
	  </div>
	</div>
	</div>
@endforeach
</div>
</div>
@endsection
