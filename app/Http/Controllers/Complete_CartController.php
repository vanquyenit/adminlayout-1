<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use Auth;
use Cart, DateTime;
class Complete_CartController extends Controller
{
    public function getComplete(Request $request){
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->status = 0;
        $order->address = $request->txtAddress;
        $order->date = new DateTime();
        $order->fullname = $request->txtUser;
        $order->email = $request->txtEmail;
        $order->phone = $request->txtPhone;
        $order->save();

        $lastInserted_order = $order->id;


        foreach(Cart::content() as $row) {
            $arCart=array(
                'order_id' => $lastInserted_order,
                'book_id'=>$row->id,
                'qty'=>$row->qty,
                'price'=>$row->price,
            );
//            OrderDetail::insert($arCart);
            $order_detail = new OrderDetail;
            $order_detail->order_id = $lastInserted_order;
            $order_detail->book_id = $arCart["book_id"];
            $order_detail->qty = $arCart["qty"];
            $order_detail->price = $arCart["price"];
            $order_detail->save();
        }

        Cart::destroy();
        return redirect()->route('getIndex');
    }
}
