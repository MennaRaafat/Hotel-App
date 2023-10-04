@extends('layouts.app')

@section('content')

<div class = "container">

@if(!auth()->user() || auth()->user()->user_type==='user')
@foreach($rooms as $room)
<div class="card mb-5">
  <div class="card-header">
  {{$room->title}}
  <a class="btn ml-5" href="{{ url('/room/'.$room -> id) }}">View</a>
  <!-- <a class="btn btn-success" href="{{ url('/booking/add/'.$room -> id) }}" style="float:right;">Book Now</a> -->
  <a class="btn btn-success" href="{{ route('bookingCreate', ['id' => $room->id]) }}" style="float:right;">Book Now</a>

</div>
  <div class="card-body">
    <h4>{{$room->title}} - {{$room->RoomType->title}}</h4>
    <h5>$ {{$room->RoomType->price}} / Day</h5>
  </div>
</div>
@endforeach


@elseif(auth()->user() && auth()->user()->user_type==='admin')
<div class="card">
  <div class="card-header">
    Rooms
    <a class="btn btn-sucess" href="{{ route('roomCreate') }}" style="float:right;">Create</a>
  </div>
  <div class="card-body">

  <table class="table table-striped" style="text-align:center;">

<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Actions</th>

</tr>

@foreach($rooms as $room)
<tr>
    <td>{{$room -> id}}</td>
    <td>{{$room->title}} - {{$room->RoomType->title}}</td>
    <td>
        <a href="" class="btn btn-primary">View</a> &nbsp;&nbsp;
        <a href="" class="btn btn-success">Edit</a> &nbsp;&nbsp;
        <a href="" class="btn btn-danger">Delete</a>
    </td>
</tr>
@endforeach

@if($rooms->isEmpty())
<tr>
    <td colspan="6"><h5>No Data Available To Show</h5></td>
</tr>
@endif
</table>

  </div>
</div>
@endif

</div>

@endsection