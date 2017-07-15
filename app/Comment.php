<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $guarded = [];

    public function book(){
        return $this->belongsTo('App\Book', 'book_id', 'id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
