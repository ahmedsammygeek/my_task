<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Tag extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
