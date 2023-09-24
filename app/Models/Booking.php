<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;


    protected $fillable = [
        'checkin_date',
        'checkout_date',
        'total_days',
        'adults_number',
        'childrens_number',
        'user_id',
        'room_id'
    ];

    public function room(){
        return $this->belongsTo(Room::class , 'room_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
