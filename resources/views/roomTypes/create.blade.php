@extends('layouts.app')

@section('content')

<div class="container">

<div class="card">
  <div class="card-header">
    Room Types
  </div>
  <div class="card-body">

<form action="/admin/roomType/store" method="POST" enctype="multipart/form-data">
   @csrf
   <label>Title</label>
   <input class="form-control" name="title" type="text">

   <label>Price</label>
   <input class="form-control" name="price" type="number">

   <label>Details</label>
   <textarea class="form-control" name="details" cols="30" rows="5"></textarea>

   <label>Room Images</label>
   <input class="form-control" type="file" multiple name="images[]">


   <button type="submit" class="btn btn-success mt-3">ADD Room Type</button>
</form>

</div>
</div>
</div>

@endsection