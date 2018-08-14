@extends('admin.app')
@section('title')
All Admins
@endsection
@section('content')
<div class="admin-index">
<a href="{{ route('admins.create') }}" class="btn btn-primary">Add Admin</a>
<form action="{{ route('admins.all') }}" method="post">
	@csrf
	<input type="submit" class="btn btn-danger delete" id="delete-admin" value="Delete">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">
      	<input type="checkbox" class="selectall-admin">
      </th>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($admins as $admin)
		<tr>
			<td>
		  <input class="select-admin" type="checkbox" name="id[]" value="{{ $admin->id }}">
		</td>
	      <th scope="row">{{ $admin->id }}</th>
	      <td>{{ $admin->name }}</td>
	      <td>{{ $admin->email }}</td>
	      <td>{{ $admin->created_at }}</td>
	      <td>
	      	<a href="{{ route('admins.edit',['id'=>$admin->id]) }}" class="btn btn-primary">edit</a>
	      	{{--
	      	<form action="{{ route('admins.destroy',['id'=>$admin->id]) }}" method="post">
	      		  @csrf
	      		{{ method_field('DELETE') }}
	      		<button class="btn btn-danger">delete</button>
	      		
	      	</form>
	      	--}}
	      </td>
	    </tr>
    @endforeach
  </tbody>
</table>
</form>
</div>

@endsection