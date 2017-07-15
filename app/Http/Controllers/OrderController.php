<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\OrderDetail;
class OrderController extends Controller
{
    public function getOrderList(){
        $order = Order::all();
        return view('admin.module.order.order', compact('order'));
    }
    public function getOrderDetail($id){
        $order = Order::find($id);
        $orderDetail = OrderDetail::select('book_id','qty', 'price')->where('order_id', $id)->get();
        return view('admin.module.order.order_detail', compact('order', 'orderDetail'));
    }

    public function getDeleteOrder($id){
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('getOrderList');
    }

    public function postUpdateStatus(Request $request){
        $id= $request->id;
        $order = Order::find($id);
        $order->status = $request->status_order;
        $order->save();
        return redirect()->route('getOrderList');

    }
}
