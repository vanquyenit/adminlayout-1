<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = "levels";
    protected $guarded = [];

    public function user(){
        return $this->hasMany('App\User', 'id', 'level_id');
    }
}
