@extends('admin.app')
@section('title')
Settings
@endsection
@section('content')
	<form action="{{ route('admin.settings') }}" role="form" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
		    <label for="">Site Name Aarbic</label>
		    <input type="text" class="form-control" name="site_name_ar" value="{{ settings()->site_name_ar }}">
	 	 </div>
	 	 <div class="form-group">
		    <label for="">Site Name English</label>
		    <input type="text" class="form-control" name="site_name_en" value="{{ settings()->site_name_en?:'' }}">
	 	 </div>
	 	 <div class="form-group">
		    <label for="">Icon</label>
		    <input type="file" class="form-control" name="icon">
	 	 <img src="{{ Storage::url(settings()->icon) }}" alt="site icon" style="height: 200px;width: 200px">
	 	 </div>
	 	 <div class="form-group">
		    <label for="">Site Lang</label>
		    <input type="text" class="form-control" name="lang" value="{{ settings()->lang }}">
	 	 </div>
	 	 <div class="form-group">
		    <label for="">Status</label>
		    <select name="status" class="form-control">
		    	<option value="1" {{ settings()->status == 1 ? 'selected' :'' }}>Opend</option>
		    	<option value="0" {{ settings()->status == 0 ? 'selected' :'' }}>Closed</option>	
		    </select>
	 	 </div>
	 	 <input type="submit" value="Update" class="btn btn-primary">
	 	 <a href="{{ route('admin.home') }}" class="btn btn-danger">Cancel</a>
	</form>
	@if(!empty($errors->all()))
		<ul class="list-group">
		@foreach($errors->all() as $error)
			<li class="list-group-item">{{ $error }}</li>
		@endforeach
		</ul>
	@endif
@endsection