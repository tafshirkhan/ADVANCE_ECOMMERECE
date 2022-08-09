<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function WishlistView(){
        return view('Frontend.Wishlist.view_wishlist');
    }

    public function GetWishlistProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        //here 'product' method comes from the relationship which is controlling from Wishlist model.
        return response()->json($wishlist);

    }

    public function RemoveWishlistProduct($id){
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success'=>'Product removed from your wishlist']);
    }
}
