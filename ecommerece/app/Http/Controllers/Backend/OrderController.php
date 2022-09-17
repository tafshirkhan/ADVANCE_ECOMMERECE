<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function PendingOrders(){
        $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('Backend.Orders.pending_orders',compact('orders'));
    }

    public function PendingOrderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('Backend.Orders.pending_ordersdetails',compact('order','orderItem'));
    }

    public function ConfirmOrders(){
        $orders = Order::where('status','confirmed')->orderBy('id','DESC')->get();
        return view('Backend.Orders.confirm_orders',compact('orders'));
    }

    public function OrdersInProcess(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('Backend.Orders.process_orders',compact('orders'));

    }

    public function PickedOrders(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('Backend.Orders.picked_orders',compact('orders'));

    }

    public function ShippedOrders(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('Backend.Orders.shipped_orders',compact('orders'));

    }

    public function DeliverdOrders(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('Backend.Orders.deliverd_orders',compact('orders'));

    }

    public function CancelOrders(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('Backend.Orders.cancel_orders',compact('orders'));

    }
}
