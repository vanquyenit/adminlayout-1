<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Mail;
class ContactController extends Controller
{
    public function getContact(){
        $cart = Cart::total(0,0,0);
        return view('frontend.pages.contact', compact('cart'));
    }

    public function postContact(Request $request){
        $data  = $request->all();
        $mailRecives = $data['txtEmail'];

        if(Mail::send('frontend.mails._contact', $data, function($msg){
            $msg->from( env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
            $msg->to('keezimin@gmail.com', 'Duy Nguyên')->subject('ChickenRain - Shop');
        })){
            return "ok";
        }else{
            return "sida";
        }

    }
}
