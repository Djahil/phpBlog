<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'file'
    ];

    public function imageable() {
        return $this->morphTo();
    }

    public function getFileAttribute($file) {
        return "/img/" . $file;
    }
}

