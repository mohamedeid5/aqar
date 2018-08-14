@extends('admin.app')
@section('title')
Create Admin
@endsection
@section('content')
<form action="{{ route('admins.store') }}" role="form" method="post">
	@csrf
	<div class="form-group">
	    <label for="">Name</label>
	    <input type="text" class="form-control" name="name">
 	 </div>
 	 <div class="form-group">
	    <label for="">Email address</label>
	    <input type="email" class="form-control" name="email">
 	 </div>
 	 <div class="form-group">
	    <label for="">Password</label>
	    <input type="password" class="form-control" name="password">
 	 </div>
 	 <input type="submit" value="Add" class="btn btn-primary">
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