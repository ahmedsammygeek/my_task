<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->hasMany(TopicTag::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function urlForSite()
    {
        return route('topics.show' , $this->id.'-'.str_replace(' ', '-', $this->title) );
    }
}
