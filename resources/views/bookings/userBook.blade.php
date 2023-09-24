@extends('layouts.app')

@section('content')
<div class = "container">
  @foreach($user_book as $user_book)
<div class="card mb-5">
  <div class="card-header">
  <h5>{{$user_book->checkin_date}} - {{$user_book->checkout_date}}</h5>
  </div>
  <div class="card-body">
    <h6>{{$user_book->room->title}} - {{$user_book->room->roomType->title}}</h6>
    <h6>Price: {{$user_book->price}}</h6>
  </div>
</div>
@endforeach
</div>
@endsection