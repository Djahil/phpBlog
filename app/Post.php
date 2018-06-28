<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillablle = [
        "title",
        "content"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function comment()
    {
        return $this->hasMany("App\Comment");;
    }

    public function category()
    {
        return $this->hasOne("App\Category");;
    }

    public function photo()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }
}

