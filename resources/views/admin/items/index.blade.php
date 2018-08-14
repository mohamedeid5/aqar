@extends('admin.app')
@section('title')
All Items
@endsection
@push('js')
<script>
  $(function () {
  

  $('a #approve').on('click',function(e){
    e.preventDefault();
  });

   $('#status').on('click',function(e){
      e.preventDefault();
       $.ajax({
         url: '{{ route('items.index').'?status=0' }}',
         type: 'get',
       })
       .done(function(data) {
         document.write(data);
       })
       .fail(function() {
       })
       .always(function() {
         console.log("complete");
       });
   });
      
 });
</script>
@endpush
@section('content')
<a href="{{ route('items.create') }}" class="btn btn-primary">Add Item</a>
<button class="btn btn-danger" id='delete-item'>Delete Item</button>
<button id="status" class="btn btn-info">un Approved</button>
<form action="{{ route('items.all') }}" method="post" id="delete-items">
	@csrf
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">
      	<input type="checkbox" class="selectall-user">
      </th>
      <th scope="col">#ID</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">City</th>
      <th scope="col">Location</th>
      <th scope="col">Price</th>
      <th scope="col">space</th>
      <th scope="col">Rooms</th>
      <th scope="col">Pathrooms</th>
      <th scope="col">FLat</th>
      <th scope="col">Takseet</th>
      <th scope="col">Tashteeb</th>
      <th scope="col">Tajeer</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $item)
		<tr>
			<td>
		  <input class="select-user" type="checkbox" name="id[]" value="{{ $item->id }}">
		</td>
	      <th scope="row">{{ $item->id }}</th>
         <td><img class="item-photo-admin" src="{{ Storage::url(App\Item::find($item->id)->photo) }}" alt="item image"></td>
	      <td>{{ $item->name }}</td>
	      <td>
			   	{{ $item->cats->cat_name }}
	      </td>
        <td>{{ $item->city }}</td>
        <td>{{ $item->location }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->space }}</td>
        <td>{{ $item->rooms }}</td>
        <td>{{ $item->pathroom }}</td>
        <td>{{ $item->flat }}</td>
        <td>{{ $item->takseet }}</td>
        <td>{{ $item->tashteeb }}</td>
        <td>{{ $item->tajeer }}</td>
	      <td>{{ $item->created_at }}</td>
	      <td>
	      	<a href="{{ route('items.edit',['id'=>$item->id]) }}" class="btn btn-primary">edit</a>
          @if($item->status == 0)
          <a href="{{ route('items.approve',['id'=>$item->id]) }}" id="approve" class="btn btn-info">approve</a>
          @endif
	      </td>
	    </tr>
    @endforeach
  </tbody>
</table>
</form>

@endsection