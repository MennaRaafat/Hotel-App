@extends('layouts.app')

@section('content')

<div class = "container">
<div class="card">
  <div class="card-header">
    Room Types
  </div>
  <div class="card-body">

  <table class="table table-striped" style="text-align:center;">

<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Price</th>
    <th>Actions</th>

</tr>

@foreach($roomTypes as $roomType)
<tr>
    <td>{{$roomType->id}}</td>
    <td>{{$roomType->title}}</td>
    <td>{{$roomType->price}}</td>
    <td>
        <a href="{{ url('/admin/roomType/'.$roomType -> id) }}" class="btn btn-primary">View</a> &nbsp;&nbsp;
        <a href="" class="btn btn-success">Edit</a> &nbsp;&nbsp;
        <a href="" class="btn btn-danger">Delete</a>
    </td>
</tr>
@endforeach

@if($roomTypes->isEmpty())
<tr>
    <td colspan="6"><h5>No Data Available To Show</h5></td>
</tr>
@endif
</table>

  </div>
</div>
</div>

@endsection