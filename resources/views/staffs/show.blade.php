@extends('layouts.app')

@section('content')
<div class = "container">
<div class="card">
  <div class="card-header">
    <td><img src="{{asset('storage/app/'.$staff_info->photo)}}" style="border-radius:50%;"/></td>
    {{$staff_info -> name}}
  </div>
  <div class="card-body">
    <h5> {{$staff_info -> departments->name}}</h5>
    <h6> {{$staff_info -> salary_amount}} /  {{$staff_info -> salary_type}}</h6>
  </div>
</div>
</div>

@endsection