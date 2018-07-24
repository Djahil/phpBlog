<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "title",
        "content"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function comments()
    {
        return $this->hasMany("App\Comment");
    }

    public function category()
    {
        return $this->belongsTo("App\Category");
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }
}

