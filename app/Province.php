<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "province";

    protected $guarded = [];

    public function district(){
        return $this->hasMany('App\District', 'districtid', 'provinceid');
    }
}
