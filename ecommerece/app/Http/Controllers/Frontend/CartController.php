<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $req, $id){
        $product = Product::findOrFail($id);

        if(Session::has('coupon')){
            Session::forget();
        }

        if($product->discount_price == NULL){
            //From bunbummen shopping cart package 
            Cart::add([
                'id' => $id, 
                'name' => $req->productName, //productName from master.blade AddToPeoduct 
                'qty' => $req->quantity, //from master.blade AddToPeoduct 
                'price' => $product->selling_price, //from db field name
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumb, //db field name
                    'color' => $req->color, //from master.blade AddToPeoduct 
                    'size' => $req->size,
                    ]
                ]);

                return response()->json(['success'=>'Added to your cart']);
        }
        else{
            Cart::add([
                'id' => $id, 
                'name' => $req->productName, //productName from master.blade AddToProduct 
                'qty' => $req->quantity, //from master.blade AddToProduct 
                'price' => $product->discount_price, //from db field name
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumb, //db field name
                    'color' => $req->color, //from master.blade AddToProduct 
                    'size' => $req->size,
                    ]
                ]);

                return response()->json(['success'=>'Added to your cart']);

        }

    } //end


    public function AddToMiniCart(){
        $minicarts = Cart::content(); //his method will return a Collection of CartItems.
        $minicartQty = Cart::count(); //This method will return the total number of items in the cart.
        $minicartTotal = Cart::subtotal(); //method can be used to get the total of all items in the cart, minus the total amount of tax,method can be used to get the calculated total of all items in the cart, given there price and quantity.

        return response()->json(array(
            'minicarts' => $minicarts,
            'minicartQty' => $minicartQty,
            'minicartTotal' => $minicartTotal,
        ));
    }

    public function RemoveFromMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success'=>'Removed from your cart']);
    }

    public function AddToWishlist(Request $req, $product_id){
        //First check whether the user is login or not
        if(Auth::check()){
            //If the user is logged in only then product will insert into the whislist
            $userExist = Wishlist::where('user_id',Auth::id())->where('product_id', $product_id)->first();
            
            if(!$userExist){
                Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),
               ]);

               return response()->json(['success'=>'Added to your wishlist']);

            }else{
               return response()->json(['error'=>'Product already exist to your wishlist']);

            }

        }else{
          return response()->json(['error'=>'You need to login first']);

        }

    }

    //APPLY COUPON//
    public function ApplyCoupon(Request $req){
        //$req->coupon_name comes from mycart_view input field which is passing through the daat from the master.blade
        $coupon = Cupon::where('coupon_name',$req->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if($coupon){
            Session::put('coupon',[
                'coupon_name'=> $coupon->coupon_name,
                'coupon_discount'=> $coupon->coupon_discount,
                'discount_amount'=> round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount'=> round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);

            return response()->json(array(
                'success'=>'Coupon redeem successful'
            ));
        }else{
            return response()->json(['error'=>'This coupon is expired or coupon is already been used']);

        }

    }

    //For calculating coupon amount
    public function CalculatingCouponAmount(){
        if(Session::has('coupon')){
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total'=> Cart::total(),
            ));
        }

    }

    //Removing the applied coupon
    public function RemoveCoupon(){
        Session::forget('coupon');
        return response()->json(['success'=>'Coupon has been removed']);

    }
}
