<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cupon;
use Carbon\Carbon;

class CuponController extends Controller
{
    public function ViewAllCupons(){
        $coupons = Cupon::orderBy('id','DESC')->get();
        
        return view('Backend.Coupons.viewallcoupons',compact('coupons'));

    }

    public function AddNewCupons(){
        return view('Backend.Coupons.addnewcoupons');
    }

    public function StoreCoupon(Request $req){

         $req->validate([
            'coupon_name'=>'required|min:4',
            'coupon_discount'=>'required',
            'coupon_validity'=>'required|date',
        ],[
            'coupon_name.required'=>'Enter a valid name',
            'coupon_discount.required'=>'Enter a valid discount',
            'coupon_validity'=>'Provide a valid date',

        ]);


        Cupon::insert([
           'coupon_name'=>strtoupper($req->coupon_name),
           'coupon_discount'=>$req->coupon_discount,
           'coupon_validity'=>$req->coupon_validity,
           'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }

    public function EditCoupons($id){
        $coupon = Cupon::findOrFail($id);
        return view('Backend.Coupons.editcoupons',compact('coupon'));
    }

    public function UpdateCoupon(Request $req, $id){

         $req->validate([
            'coupon_name'=>'required|min:4',
            'coupon_discount'=>'required',
            'coupon_validity'=>'required|date',
        ],[
            'coupon_name.required'=>'Enter a valid name',
            'coupon_discount.required'=>'Enter a valid discount',
            'coupon_validity'=>'Provide a valid date',

        ]);


        Cupon::findOrFail($id)->update([
           'coupon_name'=>strtoupper($req->coupon_name),
           'coupon_discount'=>$req->coupon_discount,
           'coupon_validity'=>$req->coupon_validity,
           'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message'=>'Updated successful',
            'alert-type'=>'success'
        );
        return redirect()->route('all.coupons')->with($notification );

    }

    public function DeleteCoupons($id){
        Cupon::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Deleted successful',
            'alert-type'=>'warning'
        );

        return redirect()->back()->with($notification);
    }
}
