@extends('layouts.app')

@section('content')

<div class="container" >
  <div id="new">

  </div>
<div class="card">
  <div class="card-header">
    Book Your Room Now
  </div>
  <div class="card-body">

<form action="/booking/store" method="POST">
   @csrf

   @if(auth()->user()->user_type == 'admin')
     <label>Customer</label>
     <select id="user_id" class="form-control" name="user_id">
     <option value="0">Select Customer</option>
     @foreach($users as $user)
     <option value="{{$user->id}}">{{$user->name}}</option>
     @endforeach
     </select>
   @endif
   <label>CheckIn Date</label>
   <input id="checkin_date" class="form-control" name="checkin_date" type="date">

   <label>CheckOut Date</label>
   <input class="form-control" name="checkout_date" type="date">

   <label>Adults Number</label>
   <input class="form-control" name="adults_number" type="number">

   <label>Children Number</label>
   <input class="form-control" name="childrens_number" type="number">
   <label>Available Rooms</label>
   @if($room_name != null)
   <select id="room_id" class="form-control" name="room_id">
   <option value="{{$room_id}}" selected="selected">{{$room_name}}</option>
   </select>
   @else
   <select id="room_id" class="form-control" name="room_id">
   <option value="">Select Your Room</option>
   </select>
   @endif
    <button type="submit" id="checkout-button" class="btn btn-success mt-3" >Checkout</button>
</form>

</div>
</div>
</div>

<script>

$(document).ready(function(){
  $("#checkin_date").on('blur' , function(){
    var checkin_date = $(this).val();
    var room_id = $("#room_id").val();
    if(room_id !== ''){
      $.ajax({
        url: "/booking/available/"+checkin_date,
        type:"GET",
        data: { id:room_id },      
        success:function(response){
          var viewHtml = $("#new");
          if(response[0].msg){
            viewHtml.html('<p class="alert alert-danger" role="alert">' + response[0].msg + '</p>'); 
            var roomsDrop =  $("#room_id");       
            roomsDrop.empty();
            roomsDrop.append($('<option></option>').attr('value', 0).text("Choose Another Room"));
            $.each(response, function(index, row){
              roomsDrop.append($('<option></option>').attr('value', row.room.id).text(row.room.title+" - "+row.type.title));
      })
    }}
  })
    }else{
      $.ajax({
      url:"/booking/available/"+checkin_date,
      success:function(response){
        var roomsDrop =  $("#room_id");
        $.each(response, function(index, row){
        roomsDrop.append($('<option></option>').attr('value', row.room.id).text(row.room.title+" - "+row.type.title));
      });
      },
      error:function(err){
        console.log(err);
      }
    })      
    }

  })
})
</script>


@endsection

