<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $guarded = [];

    public function books(){
        return $this->hasMany('App\Book', 'id', 'cate_id');
    }
}
