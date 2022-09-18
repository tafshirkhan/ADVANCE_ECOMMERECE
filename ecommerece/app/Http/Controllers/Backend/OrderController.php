<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use PDF;

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
        $orders = Order::where('status','Confirm')->orderBy('id','DESC')->get();
        return view('Backend.Orders.confirm_orders',compact('orders'));
    }

    public function OrdersInProcess(){
        $orders = Order::where('status','Processing')->orderBy('id','DESC')->get();
        return view('Backend.Orders.process_orders',compact('orders'));

    }

    public function PickedOrders(){
        $orders = Order::where('status','Picked')->orderBy('id','DESC')->get();
        return view('Backend.Orders.picked_orders',compact('orders'));

    }

    public function ShippedOrders(){
        $orders = Order::where('status','Shipped')->orderBy('id','DESC')->get();
        return view('Backend.Orders.shipped_orders',compact('orders'));

    }

    public function DeliverdOrders(){
        $orders = Order::where('status','Delivered')->orderBy('id','DESC')->get();
        return view('Backend.Orders.deliverd_orders',compact('orders'));

    }

    public function CancelOrders(){
        $orders = Order::where('status','Cancel')->orderBy('id','DESC')->get();
        return view('Backend.Orders.cancel_orders',compact('orders'));

    }

    public function PendingToConfirmOrders($order_id){
        Order::findOrFail($order_id)->update([
             'status' => 'Confirm'
             //status will field updated Pending to Confirm
        ]);

        $notification = array(
            'message'=>'Order confirmed',
            'alert-type'=>'info'
        );
        return redirect()->route('confirm.orders')->with($notification );
    }
    
    public function ConfirmOrdersToProcess($order_id){
        Order::findOrFail($order_id)->update([
             'status' => 'Processing'
             //status will field updated Confirm to Processing
        ]);

        $notification = array(
            'message'=>'Order processing starts',
            'alert-type'=>'info'
        );
        return redirect()->route('process.orders')->with($notification );

    }

    public function ProcessingOrderToPickedOrders($order_id){
        Order::findOrFail($order_id)->update([
             'status' => 'Picked'
             //status will field updated Processing to Picked
        ]);

        $notification = array(
            'message'=>'Order has been picked',
            'alert-type'=>'info'
        );
        return redirect()->route('picked.orders')->with($notification );

    }

    public function PickedOrdersToShippedOrders($order_id){
        Order::findOrFail($order_id)->update([
             'status' => 'Shipped'
             //status will field updated Processing to Picked
        ]);

        $notification = array(
            'message'=>'Order has been shipped',
            'alert-type'=>'info'
        );
        return redirect()->route('shipped.orders')->with($notification );

    }

    public function ShippedOrdersToDeliveredOrders($order_id){

        Order::findOrFail($order_id)->update([
             'status' => 'Delivered'
             //status will field updated Processing to Picked
        ]);

        $notification = array(
            'message'=>'Order has been Delivered',
            'alert-type'=>'info'
        );
        return redirect()->route('deliverd.orders')->with($notification );

    }

    public function PendingToCancelOrders($order_id){
        Order::findOrFail($order_id)->update([
             'status' => 'Cancel'
             //status will field updated Processing to Picked
        ]);
        $notification = array(
            'message'=>'Order has been Cancel',
            'alert-type'=>'warning'
        );
        return redirect()->route('cancel.orders')->with($notification );
    }

    public function AdminInvoiceDownload($order_id){

        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        //return view('Frontend.User.PlacedOrder.order_invoicepage',compact('order','orderItem'));
        $pdf = Pdf::loadView('Backend.Orders.adminorder_invoicepage', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        //whenever we want to display an image into the PDF file then we have to use public_path()
        return $pdf->download('invoice.pdf');

    }

}
