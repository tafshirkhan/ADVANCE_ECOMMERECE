<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AreaOfShipping;
use App\Models\AreaOfDistrict;
use App\Models\ShippingState;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function GetAllTheDistrict($division_id){
        $shipping_district = AreaOfDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();

        return json_encode($shipping_district);

    }

    public function GetAllTheState($district_id){
        $shipping_state = ShippingState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();

        return json_encode($shipping_state);

    }

    public function StoreCheckoutInformation(Request $req){
        //dd($req->all());
        $data = array();
        $data['shipping_name'] = $req->shipping_name;
        $data['shipping_email'] = $req->shipping_email;
        $data['shipping_phone'] = $req->shipping_phone;
        $data['post_code'] = $req->post_code;
        $data['division_id'] = $req->division_id;
        $data['district_id'] = $req->district_id;
        $data['state_id'] = $req->state_id;
        $data['notes'] = $req->notes;
        $cartTotal = Cart::total();


        if($req->payment_method == 'stripe'){
            return view('Frontend.Payment.stripe',compact('data','cartTotal'));
        }
        else if($req->payment_method == 'card'){
            return 'card';
            //return view('Frontend.Payment.card',compact('data'));


        }
        else{
            
            return view('Frontend.Payment.cash_on',compact('data','cartTotal'));


        }

    }
}
