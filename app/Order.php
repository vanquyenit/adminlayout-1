<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User' , 'id', 'user_id');
    }
    public function order_detail(){
        return $this->hasMany('App\Order' , 'id', 'order_id');
    }
}
