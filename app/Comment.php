<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'is_active', 'content', 'author', 'email'
    ];

    public function posts() {
        return $this->belongsTo("App\Post");
    }
}
