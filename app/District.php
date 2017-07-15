<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "district";

    protected $guarded = [];

    public function province(){
        return $this->belongsTo('App\Province', 'districtid', 'provinceid');
    }
}
