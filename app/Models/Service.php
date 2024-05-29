<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Service extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name' , 'subtitle' , 'content'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function urlForSite()
    {
        return route('services.show' , $this->id.'-'.str_replace(' ', '-', $this->name) );
    }
}
