@extends('site.app')
@section('title')
{{ $user->name }} | Edit
@endsection
@section('content')
<div class="container">
<form action="{{ route('profile.update',['id'=>$user->id]) }}" role="form" method="post" enctype="multipart/form-data">
	@csrf
	{{ method_field('PUT') }}
	<div class="form-group">
	    <label for="">Name</label>
	    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
 	 </div>
 	 <div class="form-group">
	    <label for="">Email address</label>
	    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
 	 </div>
 	 <div class="form-group">
	    <label for="">Password</label>
	    <input type="password" class="form-control" name="password">
 	 </div>
 	 <input type="file" name="photo" class="form-control" value="{{ old('photo') }}">
 	 <input type="hidden" value="{{ $user->password }}" name="old_password">
 	 <input type="submit" value="Update" class="btn btn-primary">
 	 <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
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
