<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $guarded = [];

    public function books_auth(){
        return $this->hasMany('App\Book','id', 'author_id');
    }
}
