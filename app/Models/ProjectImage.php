<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'image' , 'type' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
