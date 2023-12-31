<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $bookings = Booking::all(); 
        return view('bookings.index' , ['bookings' => $bookings]);
       }
    
       public function show($id){
        $booking = Booking::find($id);
        // $room_type_images = Booking::where('room_type_id',$id)->get();
        return view('bookings.show' , ['booking' => $booking ]);
       }
    
       public function create(Request $request){
        $id = $request->query('id');
        $room_name=null;
        $room_id=null;
        if($id){
         $room = Room::find($id);
         $room_name=$room->title. '-' .$room->RoomType->title;
         $room_id = $room->id;
        }
        $rooms = Room::all(); 
        $users = User::where('user_type', '!=', 'admin')->get();
        return view('bookings.create' , ['rooms'=>$rooms , 'users'=>$users , 'room_name'=>$room_name , 'room_id' => $room_id]);
       }
       
       public function store(Request $request){

        $room=Room::find($request->room_id);
        $room_type=RoomType::find($room->room_type_id);

        $booking = new Booking;
        $booking -> checkin_date = $request->checkin_date;
        $booking -> checkout_date = $request->checkout_date;
        $booking -> adults_number = $request->adults_number;
        $booking -> childrens_number = $request->childrens_number;
        $booking -> user_id = Auth::id();
        $booking -> room_id = $request->room_id;
        $booking -> total_days = Carbon::parse($request->checkout_date)->diffInDays(Carbon::parse($request->checkin_date));
        $booking -> price = $room_type->price * $booking -> total_days;
        $booking ->save();


        \Stripe\Stripe::setApiKey('sk_test_51NsPHLEJa7oq4gAE4CI6RXA4Q8fzyacwbHrME5LN3kAf3EkOiT96l5mTyfttqaRuZC9v1kL84cyrIf9JuOiVi4eB00YFMoJwPz');
        header('Content-Type: application/json');
        require_once '../vendor/autoload.php';
        $checkout_session = \Stripe\Checkout\Session::create([
         'payment_method_types'=>['card'],
         'line_items' => [[
         'price_data' => [
         'currency'=>'USD',
         'product_data' => [
         'name' => $room_type->title
        ],
        'unit_amount' => $booking -> price
         ],
         'quantity' => 1,
         ]],
         'mode' => 'payment',
         'success_url' =>'http://127.0.0.1:8000/booking/sucess?session_id={CHECKOUT_SESSION_ID}',
         'cancel_url' => 'http://127.0.0.1:8000/booking/fail',
        ]);
        return redirect($checkout_session->url);
      }

      public function available_rooms(Request $request,$checkin_date){
        $id = $request->query('id');            
        $rooms = DB::select("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
        if($id){
          $rooms_booked = DB::select("SELECT * FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date AND room_id = $id");
          if($rooms_booked){
            $msg = "You Can't Book THis Room because It's aleardy booked in this time choose another room";
            $data=[];
            foreach($rooms as $room){
              $type=RoomType::find($room->room_type_id);
              $data[]=['room'=>$room , 'type' =>$type , 'msg'=>$msg];
          }
          return response()->json($data);
          }
        }else{

         $data=[];
         foreach($rooms as $room){
          $type=RoomType::find($room->room_type_id);
          $data[]=['room'=>$room , 'type' =>$type];
      }
      return response()->json($data);
    }
    }

      public function payment_success(Request $request){

        \Stripe\Stripe::setApiKey('sk_test_51NsPHLEJa7oq4gAE4CI6RXA4Q8fzyacwbHrME5LN3kAf3EkOiT96l5mTyfttqaRuZC9v1kL84cyrIf9JuOiVi4eB00YFMoJwPz');
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        // $customer = \Stripe\Checkout\Session::retrieve($request->customer);
        if( $session->payment_status){
          if(auth()->user()->user_type=='admin'){
            return redirect()->route('bookingIndex')->with('sucess' , 'Data is Added Successfully');
          }else{
            return redirect()->route('userBook')->with('sucess' , 'Data is Added Successfully');
          }
        }

      }

      public function payment_fail(Request $request){
      // dd($request);
       $user = Auth::id();
       $book_cancel = Booking::where('user_id' , $user)->latest()->first();
       $book_cancel -> delete();
       return redirect()->route('bookingIndex')->with('fail' , 'Something Went Wrong');
      }

      public function userBook(){
        $user = Auth::id();
        $user_book = Booking::where('user_id' , $user)->get();

        $roomIds = $user_book->pluck('room_id')->toArray();
        return view('bookings.userBook' , ['user_book'=>$user_book]);

      }
    }
