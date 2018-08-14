@extends('site.app')
@section('title')
{{ $item->name }}
@endsection
@section('content')
<div class="container">
	<h1>{{ $item->name }}</h1>
      <img style="width: 300px;" class="card-img-top" src="{{ Storage::url($item->photo) }}" alt="Card image cap">  <br>
      <span>{{ $item->description }}</span> <br>
      <span>{{ $item->rooms }}</span><br>
      <span>{{ $item->flat }}</span><br>
      <span>{{ $item->pathroom }}</span><br>
      <span>{{ $item->tashteeb }}</span><br>
      <span>{{ $item->takseet }}</span><br>
      <span>{{ $item->tajeer }}</span><br>
</div>
@endsection