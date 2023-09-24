@extends('layouts.app')

@section('content')

<div class="container">

<div class="card">
  <div class="card-header">
    Room Types
  </div>
  <div class="card-body">

<form action="/admin/department/store" method="POST">
   @csrf
   <label>Department Name</label>
   <input class="form-control" name="name" type="text">
   
   <label>Department Description</label>
   <input class="form-control" name="description" type="text">

   <button type="submit" class="btn btn-success mt-3">ADD Room</button>
</form>

</div>
</div>
</div>

@endsection