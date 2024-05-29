<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Product extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name' , 'content'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
