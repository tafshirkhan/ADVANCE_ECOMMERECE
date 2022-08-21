<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AreaOfShipping;
use App\Models\AreaOfDistrict;
use App\Models\ShippingState;

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


        if($req->payment_method == 'mobile'){
            return view('Frontend.Payment.mobile',compact('data'));
        }
        else if($req->payment_method == 'card'){
            return 'card';
            //return view('Frontend.Payment.card',compact('data'));


        }
        else{
            return 'cash';
            //return view('Frontend.Payment.cashon',compact('data'));


        }

    }
}
