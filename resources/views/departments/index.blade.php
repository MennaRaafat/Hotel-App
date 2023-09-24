@extends('layouts.app')

@section('content')

<div class = "container">
<div class="card">
  <div class="card-header">
  Departments
  <a class="btn btn-sucess" href="{{ route('departmentCreate') }}" style="float:right;">Create</a>

  </div>
  <div class="card-body">

  <table class="table table-striped" style="text-align:center;">

<tr>
    <th>ID</th>
    <th>Department Name</th>
    <th>Actions</th>

</tr>

@forelse($departments as $department)
<tr>
    <td>{{$department -> id}}</td>
    <td>{{$department->name}}</td>
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