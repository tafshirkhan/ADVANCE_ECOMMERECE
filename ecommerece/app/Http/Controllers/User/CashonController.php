<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoiceMail;
use App\Models\Cupon;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;

class CashonController extends Controller
{
    public function CashonPaymentOrder(Request $req){


        //This is for if there are any copoun then this will deduct amount from the original price.
          if(Session::has('coupon')){ 
            $total_amount = Session::get('coupon')['total_amount']; //from Frontend/CartController ApplyCoupon method
          }else{
            $total_amount = round(Cart::total());
          }

         
        
        //insertGetId(): This method is also used for insert records into the database table. This method is used in those case when an id field of the table is auto incrementing. It returns the id of current inserted records.
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $req->division_id,
            'district_id' => $req->district_id,
            'state_id' => $req->state_id,
            'name'=>$req->name,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'post_code'=>$req->post_code,
            'notes'=>$req->notes,

            'payment_type'=>'Casn-on',
            'payment_method'=>'Cash-on',
            
            'currency'=>'TK',
            'amount'=>$total_amount,
            'invoice_no'=> 'HAPPY_SHOPPING'.mt_rand(10000000,99999999),
            'order_date'=>Carbon::now()->format('d F Y'),
            'order_month'=>Carbon::now()->format('F Y'),
            'order_year'=>Carbon::now()->format('Y'),
            'status'=>'Pending',
            'created_at'=>Carbon::now(),

        ]);
    
        //Sending mail to thw user after completing the payment
       /* $invoice = Order::findOrFail('order_id');//for specific one row data
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount'=>$total_amount,
            'name'=>$invoice->name,
            'phone'=>$invoice->phone,
            'email'=>$invoice->email,
            'district' => $invoice->district_id,
            'state' => $invoice->state_id,
        ];
        Mail::to($req->email)->send(new OrderInvoiceMail($data));*/

        $carts = Cart::content();//will get all the cart product which is user added to their cart
        //Here using loop becasue there might be multiple products into the cart.
        foreach($carts as $cart){
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' =>$cart->id,
                'color'=>$cart->options->color,
                'size'=>$cart->options->size,
                'qty'=>$cart->qty,
                'price'=>$cart->price,
                'created_at'=>Carbon::now(),

            ]);

        }

        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        Cart::destroy();

        $notification = array(
            'message'=>"Order successfully placed",
            'alert-type'=>'success'
        );

        return redirect()->route('dashboard')->with($notification);

    }
}
