<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        "name"
    ];

    public function photos(){
        return $this->morphOne('App\Photo', 'imageable');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
