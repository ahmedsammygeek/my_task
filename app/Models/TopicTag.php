<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicTag extends Model
{
    use HasFactory;

    protected $fillable = ['tag_id' , 'user_id' ];

    public function tag()
    {
        return $this->belongsTo(Tag::class  , 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
