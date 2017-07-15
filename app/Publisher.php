<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = "publishers";
    protected $guarded = [];
    public function books(){
        return $this->hasMany('App\Book', 'id', 'publish_id');
    }
}
