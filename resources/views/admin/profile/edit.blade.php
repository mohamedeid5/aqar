@extends('admin.app')
@section('title')
Profile
@endsection
@section('content')
<form action="{{ route('admin.profile.update',$admin->id) }}"  method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" name="name"  class="form-control" value="{{ $admin->name }}">
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="text" name="email" class="form-control" value="{{ $admin->email }}">
	</div>
	<div class="form-group">
		<label for="">Password</label>
		<input type="password" name="password" class="form-control">
	</div>
	 <input type="hidden" value="{{ $admin->password }}" name="old_password">
	<div class="form-group">
		<label for="">photo</label>
		<input type="file" name="photo" class="form-control" value="{{ $admin->photo }}">
	</div>
	<input type="submit" class="btn btn-primary">
</form>
@if(!empty($errors->all()))
		<ul class="list-group">
		@foreach($errors->all() as $error)
			<li class="list-group-item">{{ $error }}</li>
		@endforeach
		</ul>
	@endif
@endsection