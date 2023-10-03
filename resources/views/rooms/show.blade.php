@extends('layouts.app')

@section('content')

<div class = "container">

<div class="card">
  <div class="card-header">
    {{$room->title}}
  </div>
<div class="card-body">
    <h4>{{$room->title}} - {{$room->RoomType->title}}</h4>
    <h5>$ {{$room->RoomType->price}} / Day</h5>
    @foreach($room->RoomType->room_type_images as $room_image)
    <img src="{{asset('/storage/'.$room_image->image)}}" style="border-radius:50%;width:10%;height:5vh;"/>
    @endforeach
</div>
</div>


<div class="card mt-5">
  <div class="card-header">
    Comments
  </div>
<div class="card-body">

   <label>Comment</label>
   <input class="form-control" id="comment" name="comment" type="text">
   <button type="submit" id="commentSubmit" class="btn btn-success mt-3">ADD Comment</button>

<hr>

<div id="commentContent">

</div>

</div>
</div>
</div>


</div>


<script> 
  var roomId = '{{ $room->id }}';

  function listen(){
   Echo.channel('room.'+roomId)
       .listen('.my-event',function(e){
       console.log("New comment received");
       console.log(e.comment);
      // $("#commentContent").prepend(comment + '<hr>');
    });
}

$(document).ready(function(){
  var commentContent = $("#commentContent");

  $.ajax({
      url:'/room/' + roomId + '/comment',
      method:"GET",
      success:function(response){
        var html = '';
      response.forEach(function(comment){
        html += '<p>' + comment.comment + '</p> <hr>';
      });

      commentContent.html(html);         
    }
});

  $("#commentSubmit").on("click", function(e){
    e.preventDefault();
    var comment = $("#comment").val();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: '/room/' + roomId + '/comment',
      method: "POST",
      headers: {
        'X-CSRF-TOKEN': csrfToken
      },
      data: {'comment': comment},
      success: function(response){
        $("#comment").val('');
        $("#commentContent").prepend(response.comment + '<hr>');
        listen();
      }
    });
  });

});
</script>

@endsection