@extends('layouts.app')

@section('content')

<div class="container">

<div class="card">
  <div class="card-header">
    Room Types
  </div>
  <div class="card-body">

<form action="/admin/room/store" method="POST">
   @csrf
   <label>Title</label>
   <input class="form-control" name="title" type="text">
   
   <label>Room Type</label>
   <select class="form-control" name="room_type_id">
    <option value="0">-- Select Room Type --</option>
    @foreach($roomTypes as $roomType)
    <option value="{{$roomType->id}}">{{$roomType->title}}</option>
    @endforeach
   </select>

   <button type="submit" class="btn btn-success mt-3">ADD Room</button>
</form>

</div>
</div>
</div>

@endsection