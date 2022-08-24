<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function StripPaymentOrder(Request $req){
           // Set your secret key. Remember to switch to your live secret key in production.
          // See your keys here: https://dashboard.stripe.com/apikeys

          // \Stripe\Stripe::setApiKey('sk_test_51LaFFoD1QbGk12MCc3340WQkvPt5vuYRdLhWEbRk5KG4s8iIzJdaai3JZwB2UJEWvifeYi4jxnCp2jSijp876zOI00xgawqUHC'); (privious one)
          \Stripe\Stripe::setApiKey('sk_test_51LaFFoD1QbGk12MCc3340WQkvPt5vuYRdLhWEbRk5KG4s8iIzJdaai3JZwB2UJEWvifeYi4jxnCp2jSijp876zOI00xgawqUHC'); //(update one)

         // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            //'amount' => 999, this is default which will not work
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => 'Happy shopping',
            'source' => $token,
            'metadata' => ['order_id' => '6735'],
        ]);
        dd($charge);

    }
}
