@extends('layouts.app')

@section('content')
<div class = "container">
<div class="card">
  <div class="card-header">
    Room Type
  </div>
  <div class="card-body">

  <table class="table table-striped" style="text-align:center;">

<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Price</th>
    <th>Gallery</th>

</tr>

<tr>
    <td>{{$roomType -> id}}</td>
    <td>{{$roomType->title}}</td>
    <td>{{$roomType->price}}</td>
    @foreach($room_type_images as $room_type_image)
    <td><img src="{{asset('storage/app/'.$room_type_image->image)}}"/></td>
    @endforeach
</tr>

</table>

  </div>
</div>
</div>

@endsection