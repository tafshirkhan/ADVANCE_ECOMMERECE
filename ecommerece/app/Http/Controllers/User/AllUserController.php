<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Mail\OrderInvoiceMail;
use App\Models\Cupon;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;

class AllUserController extends Controller
{
    public function PlacedOrders(){
        $orders = Order::where('user_id', Auth::id())->orderBy('id','DESC')->get();
        return view('Frontend.User.PlacedOrder.order_viewpage',compact('orders'));

    }

    public function OrderDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('Frontend.User.PlacedOrder.order_details',compact('order','orderItem'));

    }
}
