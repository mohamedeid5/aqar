@extends('admin.app')
@section('title')
All Users
@endsection
@section('content')
<div class="admin-index">
<a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
<form action="{{ route('users.all') }}" method="post">
	@csrf
	<input type="submit" class="btn btn-danger delete" id="delete-user" value="Delete">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">
      	<input type="checkbox" class="selectall-user">
      </th>
      <th scope="col">#ID</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
		<tr>
			<td>
		  <input class="select-user" type="checkbox" name="id[]" value="{{ $user->id }}">
		</td>
	      <th scope="row">{{ $user->id }}</th>
	      <td><img class="user-photo-admin" src="{{ Storage::url(App\User::find($user->id)->photo) }}" alt="user image"></td>
	      <td>{{ $user->name }}</td>
	      <td>{{ $user->email }}</td>
	      <td>{{ $user->created_at }}</td>
	      <td>
	      	<a href="{{ route('users.edit',['id'=>$user->id]) }}" class="btn btn-primary">edit</a>
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