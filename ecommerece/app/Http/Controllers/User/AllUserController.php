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
use PDF;

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

    public function DownloadInvoice($order_id){
        
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('products')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        //return view('Frontend.User.PlacedOrder.order_invoicepage',compact('order','orderItem'));
        $pdf = Pdf::loadView('Frontend.User.PlacedOrder.order_invoicepage', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        //whenever we want to display an image into the PDF file then we have to use public_path()
        return $pdf->download('invoice.pdf');

    }

    public function ReturnOrder(Request $req, $order_id){
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $req->return_reason
        ]);

        $notification = array(
            'message'=>"Return request has been sent",
            'alert-type'=>'warning'
        );
        
        return redirect()->route('order.placed')->with($notification);
    }

    public function ReturnOrderList(){
        $orders = Order::where('user_id', Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('Frontend.User.PlacedOrder.returnorder_viewpage',compact('orders'));
    }

    public function CancelOrderList(){
        $orders = Order::where('user_id', Auth::id())->where('status','Cancel')->orderBy('id','DESC')->get();
        return view('Frontend.User.PlacedOrder.cancelorder_viewpage',compact('orders'));
    }
}
