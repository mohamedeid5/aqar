@extends('admin.app')
@section('title')
Create Admin
@endsection
@section('content')
<form action="{{ route('admins.update',$admin->id) }}" role="form" method="post">
	@csrf
	@method('put')
	<div class="form-group">
	    <label for="">Name</label>
	    <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
 	 </div>
 	 <div class="form-group">
	    <label for="">Email address</label>
	    <input type="email" class="form-control" name="email" value="{{ $admin->email }}">
 	 </div>
 	 <div class="form-group">
	    <label for="">Password</label>
	    <input type="password" class="form-control" name="password">
 	 </div>
 	 <input type="hidden" name="old_password" value="{{ $admin->password }}">
 	 <input type="submit" value="Edit" class="btn btn-primary">
 	 <a href="{{ route('admins.index') }}" class="btn btn-danger">Cancel</a>
</form>
@if(!empty($errors->all()))
	<ul class="list-group">
	@foreach($errors->all() as $error)
		<li class="list-group-item">{{ $error }}</li>
	@endforeach
	</ul>
@endif
@endsection