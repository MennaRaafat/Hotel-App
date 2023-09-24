@extends('layouts.app')

@section('content')

<div class = "container">
<div class="card">
  <div class="card-header">
    Staff
    <a class="btn btn-sucess" href="{{ route('staffCreate') }}" style="float:right;">Create</a>
  </div>
  <div class="card-body">

  <table class="table table-striped" style="text-align:center;">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Salary Amount</th>
    <th>Department</th>
    <th>Actions</th>

</tr>

@forelse($staffs as $staff)
<tr>
    <td>{{$staff -> id}}</td>
    <td>{{$staff->name}}</td>
    <td>{{$staff->salary_amount}}</td>
    <td>{{$staff->departments->name}}</td>
    <td>
        <a href="" class="btn btn-primary">View</a> &nbsp;&nbsp;
        <a href="" class="btn btn-success">Edit</a> &nbsp;&nbsp;
        <a href="" class="btn btn-danger">Delete</a>
    </td>
</tr>

@empty
<tr>
    <td colspan="6"><h5>No Data Available To Show</h5></td>
</tr>
@endforelse

</table>

  </div>
</div>
</div>

@endsection