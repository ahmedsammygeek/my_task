<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    use HasFactory;

    protected $casts = [
        'check_in_date' => 'date' , 
        'check_out_date' => 'date'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
