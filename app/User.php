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

    public function book(){
        return $this->hasMany('App\Book', 'id', 'user_id');
    }

    public function comment(){
        return $this->hasMany('App\Comment', 'id', 'user_id');
    }

    public function order(){
        return $this->hasMany('App\Order', 'id', 'user_id');
    }

    public function level(){
        return $this->hasOne('App\Level', 'id', 'level_id');
    }
}
