<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillabl=[
       'comment',
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
