@extends('layouts.app')

@section('content')

<div class = "container">
<div class="card">
  <div class="card-header">
    Hotel Bookings
    <a class="btn btn-sucess" href="{{ route('bookingCreate') }}" style="float:right;">Book Now</a>
  </div>
  <div class="card-body">

  <table class="table table-striped" style="text-align:center;">

<tr>
    <th>ID</th>
    <th>CheckIn Date</th>
    <th>CheckOut Date</th>
    <th>Room Number</th>
    <th>Price</th>
    <th>Customer Name</th>
    <th>Actions</th>

</tr>

@foreach($bookings as $booking)
<tr>
    <td>{{$booking -> id}}</td>
    <td>{{$booking->checkin_date}}</td>
    <td>{{$booking->checkout_date}}</td>
    <td>{{$booking->room->title}}</td>
    <td>{{$booking->price}}</td>
    <td>{{$booking->user->name}}</td>
    <td>
        <a href="" class="btn btn-primary">View</a> &nbsp;&nbsp;
        <a href="" class="btn btn-success">Edit</a> &nbsp;&nbsp;
        <a href="" class="btn btn-danger">Delete</a>
    </td>
</tr>
@endforeach

@if($bookings->isEmpty())
<tr>
    <td colspan="6"><h5>No Data Available To Show</h5></td>
</tr>
@endif
</table>

  </div>
</div>
</div>

@endsection