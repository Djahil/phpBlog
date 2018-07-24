<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function isAdmin()
    {

        foreach ($this->roles as $role) {
            if ($role->name == 'Administrator') {
                return true;
            }
        }
        return false;
    }


    public function isAuthor()
    {

        foreach ($this->roles as $role) {
            if ($role->name == 'Author') {
                return true;
            }
        }
        return false;
    }

    public function isModerator()
    {

        foreach ($this->roles as $role) {
            if ($role->name == 'Moderator') {
                return true;
            }
        }
        return false;
    }
}

