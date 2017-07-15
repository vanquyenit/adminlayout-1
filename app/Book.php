<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";

    protected $guarded = [];

    public function cate(){
        return $this->belongsTo('App\Category', 'cate_id', 'id');
    }

    public function comment(){
        return $this->hasMany('App\Comment', 'book_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function authors(){
        return $this->belongsTo('App\Author', 'author_id', 'id');
    }

    public function publishers(){
        return $this->belongsTo('App\Publisher', 'publish_id','id');
    }

    public function order_detail(){
        return $this->hasMany('App\OrderDetail' , 'book_id', 'id');
    }

    public static function getAllBook(){
        $book = Book::select('id', 'name', 'slug', 'image', 'price', 'cate_id', 'author_id')->where('public', 1)->orderBy('id', "DESC")->take(4)->get();
        return $book;
    }

}
