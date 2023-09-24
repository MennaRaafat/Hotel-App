<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
    ];

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function room_type_images(){
        return $this->hasMany(RoomTypeImage::class);
    }
}
