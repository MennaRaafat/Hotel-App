<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'bio',
        'salary_type',
        'salary_amount',
        'department_id'
    ];

    public function departments(){
        return $this->belongsTo(Department::Class , 'department_id');
    }
}
