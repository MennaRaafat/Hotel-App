@extends('layouts.app')

@section('content')

<div class = "container">
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
    <td>{{$room->title}}</td>
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
</div>

@endsection