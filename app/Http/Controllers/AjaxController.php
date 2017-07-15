<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Province;
use App\District;

class AjaxController extends Controller
{
    public function getQuanHuyen($id){
        $district = District::where('provinceid', $id)->get();
        foreach ($district as $value){
            echo "<option value='".$value->districtid."'>".$value->name."</option>";
        }
    }

    

}
