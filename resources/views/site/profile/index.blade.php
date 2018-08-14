@extends('site.app')
@section('title')
{{ $user->name }}
@endsection
@section('content')
<div class="container">
	<a href="{{ route('profile.edit',$user->id) }}" class="btn btn-info">Edit Profile</a> 
	<h3>Photo</h3>
	<img style="width: 161px;
	    height: 125px;
	    border-radius: 50%;" src="{{ Storage::url(auth()->user()->photo) }}" alt=""> 
	<h3>Name</h3>
	<p>{{ $user->name }}</p>
	<h3>Email</h3>
	<p>{{ $user->email }}</p>
</div>
@endsection