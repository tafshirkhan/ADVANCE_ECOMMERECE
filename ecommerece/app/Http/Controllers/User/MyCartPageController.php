<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class MyCartPageController extends Controller
{
    public function MyCartView(){
        return view('Frontend.Mycart.mycart_view');
    }

    public function GetMyCartProduct(){
        //bumbumme package
        $mycarts = Cart::content(); //this method will return a Collection of CartItems.
        $mycartQty = Cart::count(); //This method will return the total number of items in the cart.
        $mycartTotal = Cart::subtotal(); //method can be used to get the total of all items in the cart, minus the total amount of tax,method can be used to get the calculated total of all items in the cart, given there price and quantity.

        return response()->json(array(
            'mycarts' => $mycarts,
            'mycartQty' => $mycartQty,
            'mycartTotal' => $mycartTotal,
        ));
    }

    public function RemoveMyCartProduct($rowId){
        Cart::remove($rowId);
        return response()->json(['success'=>'Removed from your cart']);
    }

    //Cart Increment
    public function CartIncrement($rowId){
        //from Bumbummn packages
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        return response()->json(['increment']);
    }

    public function CartDecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        return response()->json(['decrement']);

    }
}
