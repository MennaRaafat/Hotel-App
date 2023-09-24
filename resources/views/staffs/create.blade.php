@extends('layouts.app')

@section('content')

<div class="container">

<div class="card">
  <div class="card-header">
    Add New Staff Member
  </div>
  <div class="card-body">

<form action="/admin/staff/store" method="POST" enctype="multipart/form-data">
   @csrf
   <label>Name</label>
   <input class="form-control" name="name" type="text">

   <label>Photo</label>
   <input class="form-control" type="file" name="photo">

   <label>Bio</label>
   <input class="form-control" name="bio" type="text">
   
   <label>Salary Type</label>
   <select class="form-control" name="salary_type">
    <option>-- Select Salary Type --</option>
    <option>Monthly</option>
    <option>Daily</option>
   </select>

   <label>Salary Amount</label>
   <input class="form-control" name="salary_amount" type="number">

   <label>Department</label>
   <select class="form-control" name="department_id">
    <option value="0">-- Select Department Type --</option>
    @foreach($departments as $department)
    <option value="{{$department->id}}">{{$department->name}}</option>
    @endforeach
   </select>

   <button type="submit" class="btn btn-success mt-3">ADD New Staff</button>
</form>

</div>
</div>
</div>

@endsection