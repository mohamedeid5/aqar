@extends('admin.app')
@section('title')
Profile
@endsection
@section('content')

<a href="{{ route('admin.profile.edit',$admin->id) }}" class="btn btn-info">Edit Profile</a>
<h3>Name</h3>
<p>{{ $admin->name }}</p>
<h3>Email</h3>
<p>{{ $admin->email }}</p>
<h3>Photo</h3>
<img src="{{ Storage::url(auth()->guard('admin')->user()->photo) }}" alt="">
@endsection