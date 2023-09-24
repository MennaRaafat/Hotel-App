<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
  
    public function index(){
        $rooms = Room::all(); 
        return view('rooms.index' , ['rooms' => $rooms]);
       }
    
       public function create(){
        $roomTypes = RoomType::all(); 
        return view('rooms.create', ['roomTypes' => $roomTypes]);
       }
    
       public function store(Request $request){
        $roomType = Room::create($request -> all());
        if($roomType){
            return redirect()->route('roomIndex');
        }
      }

}
