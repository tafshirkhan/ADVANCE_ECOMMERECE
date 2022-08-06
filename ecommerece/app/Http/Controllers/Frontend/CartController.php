<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function AddToCart(Request $req, $id){
        $product = Product::findOrFail($id);

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
                'name' => $req->productName, //productName from master.blade AddToPeoduct 
                'qty' => $req->quantity, //from master.blade AddToPeoduct 
                'price' => $product->discount_price, //from db field name
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumb, //db field name
                    'color' => $req->color, //from master.blade AddToPeoduct 
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
}
