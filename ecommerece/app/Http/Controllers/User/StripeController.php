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

class StripeController extends Controller
{
    public function StripePaymentOrder(Request $req){
        //This is for if there are any copoun then this will deduct amount from the original price.
          if(Session::has('coupon')){ 
            $total_amount = Session::get('coupon')['total_amount']; //from Frontend/CartController ApplyCoupon method
          }else{
            $total_amount = round(Cart::total());
          }

         /*META DATA */
         //from https://stripe.com/docs/payments/charges-api.
           // Set your secret key. Remember to switch to your live secret key in production.
          // See your keys here: https://dashboard.stripe.com/apikeys

          // \Stripe\Stripe::setApiKey('sk_test_51LaFFoD1QbGk12MCc3340WQkvPt5vuYRdLhWEbRk5KG4s8iIzJdaai3JZwB2UJEWvifeYi4jxnCp2jSijp876zOI00xgawqUHC'); (privious one)
          \Stripe\Stripe::setApiKey('sk_test_51LaFFoD1QbGk12MCc3340WQkvPt5vuYRdLhWEbRk5KG4s8iIzJdaai3JZwB2UJEWvifeYi4jxnCp2jSijp876zOI00xgawqUHC'); //(update one)

         // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            //'amount' => 999, this is default which will not work
            'amount' => $total_amount*100,
            'currency' => 'usd',
            'description' => 'Happy shopping',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()], //uniqid() will generate unique id
        ]);
        //dd($charge);
        
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

            'payment_type'=>'Stripe',
            'payment_method'=>'Stripe',
            'payment_type'=>$charge->payment_method,
            'transaction_id'=>$charge->balance_transaction,
            'currency'=>$charge->currency,
            'amount'=>$total_amount,
            'order_number'=>$charge->metadata->order_id,
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
