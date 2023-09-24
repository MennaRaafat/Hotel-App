@extends('layouts.app')

@section('content')

<div class="container">

<div class="card">
  <div class="card-header">
    Book Your Room Now
  </div>
  <div class="card-body">

<form action="/booking/store" method="POST">
   @csrf
   <label>CheckIn Date</label>
   <input id="checkin_date" class="form-control" name="checkin_date" type="date">

   <label>CheckOut Date</label>
   <input class="form-control" name="checkout_date" type="date">

   <label>Adults Number</label>
   <input class="form-control" name="adults_number" type="number">

   <label>Children Number</label>
   <input class="form-control" name="childrens_number" type="number">

   <label>Available Rooms</label>
   <select id="room_id" class="form-control" name="room_id">
   <option value="">Select Your Room</option>
   </select>

   <!-- <button type="submit" class="btn btn-success mt-3">Book</button> -->
   <!-- <form action="/checkout.php" method="POST"> -->
        <button type="submit" id="checkout-button" class="btn btn-success mt-3" >Checkout</button>
      <!-- </form> -->
</form>

</div>
</div>
</div>

<script>
$(document).ready(function(){
  $("#checkin_date").on('blur' , function(){
    var checkin_date = $(this).val();
    $.ajax({
      url:"/admin/booking/available/"+checkin_date,
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
  })
})
</script>


@endsection

