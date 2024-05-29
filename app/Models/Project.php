<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Project extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name' , 'content'];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }


    public function urlForSite()
    {
        return route('projects.show' , $this->id.'-'.str_replace(' ', '-', $this->name) );
    }
}
