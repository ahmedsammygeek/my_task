<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Area extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];


    public function rooms()
    {
        return $this->hasMany(Room::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
