<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;




    public function roomsTypesAsText()
    {
        switch ($this->type) {
            case 1:
            return 'Single';
            break;
            case 1:
            return 'Double';
            break;
            case 1:
            return 'Suite';
            break;            
            default:
            return 'لم يتم التحديد';
            break;
        }
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }


    public function urlForSite()
    {
        return route('rooms.show' , $this->id.'-'.str_replace(' ', '-', $this->name) );
    }
}
