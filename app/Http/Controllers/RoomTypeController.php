<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Models\RoomTypeImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{

   public function index(){
    $roomTypes = RoomType::all(); 
    return view('roomTypes.index' , ['roomTypes' => $roomTypes]);
   }

   public function show($id){
    $roomType = RoomType::find($id);
    $room_type_images = RoomTypeImage::where('room_type_id',$id)->get();
    return view('roomTypes.show' , ['roomType' => $roomType , 'room_type_images' => $room_type_images]);
   }

   public function create(){
    return view('roomTypes.create');
   }

   public function store(Request $request){
    // $roomType = RoomType::create($request -> all());(
    $roomType = new RoomType;
    $roomType -> title = $request->title;
    $roomType -> details = $request->details;
    $roomType -> price = $request->price;
    $roomType ->save();
    foreach($request -> file('images') as $image){
      // $imagePath = $image -> store('public/images');
      // dd($image);
      $roomTypeImage = new RoomTypeImage;
      $roomTypeImage->room_type_id = $roomType->id;

      $content=file_get_contents($image);
      $ext = $image->extension();
      $filename = Str::random(25);
      $file_path = "images/$filename.$ext";
      Storage::disk('public') -> put( $file_path , $content);
      $roomTypeImage->image = $file_path;

      $roomTypeImage->description = $request->title;
      $roomTypeImage->save();
    }

    return redirect()->route('roomTypeIndex')->with('sucess' , 'Data is Added Successfully');
    
  }

}
