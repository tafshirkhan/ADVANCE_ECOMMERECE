<?php

namespace App\Http\Controllers\Frontend;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImage;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function ViewIndexPage(){
        $slider = Slider::where('status',1)->orderBy('id','DESC')->limit(4)->get();
        $category = Category::orderBy('category_name', 'ASC')->get();
        $product = Product::where('status',1)->orderBy('id','DESC')->get();

        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(5)->get();
        $hotdeals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(2)->get();
        $specialoffer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();
        $specialdeals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();
        
        $skipcategory = Category::skip(0)->first();
        $skipproduct = Product::where('status',1)->where('category_id',$skipcategory->id)->orderBy('id','DESC')->get();
        //return $skipcategory->id;
        //die();

        $skipcategory_1 = Category::skip(1)->first();
        $skipproduct_1 = Product::where('status',1)->where('category_id',$skipcategory_1->id)->orderBy('id','DESC')->get();

        $skipbrand_1 = Brand::skip(3)->first();
        $skip_brandproduct_1 = Product::where('status',1)->where('category_id',$skipbrand_1->id)->orderBy('id','DESC')->get();



        return view('Frontend.index',compact('category','slider','product','featured','hotdeals','specialoffer','specialdeals','skipcategory','skipproduct','skipcategory_1','skipproduct_1','skipbrand_1','skip_brandproduct_1'));
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $userId = Auth::user()->id;
        $user = User::find($userId);

        return view('Frontend.Profile.user_profile',compact('user'));
    }


    public function UserUpdateProfile(Request $req){
        
        $user = Auth::user()->id;
        $data = User::find($user);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->phone = $req->phone;

        if($req->file('profile_photo_path')){
            $file = $req->file('profile_photo_path');
            @unlink(public_path('upload/userImage/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/userImage'),$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $message = array(
            'message'=>'Profile updated successful',
            'alert-type'=>'success'
        );
        return redirect()->route('dashboard')->with($message);

    }

    public function UserPassword(){
        $data= Auth::user()->id;
        $user = User::find($data);
        return view('Frontend.Profile.user_password',compact('user'));
         //return view('Frontend.Profile.user_password');

    }

    public function UserUpdatePassword(Request $req){

         $valid = $req->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',
        ]);
        
        //$data = Auth::user()->id;
        $hashPass = Auth::user()->password;
        if(Hash::check($req->oldpassword, $hashPass)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($req->password);
            $user->save();
            //after changing the password user will logout 
            Auth::logout();
            return redirect()->route('user.login');
        }
        else{
            return redirect()->back();
        }
    }

    public function ProductDetails_info($id,$slug){
        $product = Product::findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color); //explode is use for ignoring semicolon here

        $size = $product->product_size;
        $product_size = explode(',', $size);

        //$data['size'] = $product->product_size;
        //$data['product_size'] = explode(',', $size);

        
        $multiImg = MultiImage::where('product_id',$id)->get();
        
        $cat_id = $product->category_id;
        $relatedproduct = Product::where('category_id', $cat_id)->where('id','!=',$id)->orderBy('id', 'DESC')->get();

        return view('Frontend.Product.product_details',compact('product','multiImg','product_color','product_size','relatedproduct'));
        //or
        //return view('Frontend.Product.product_details',$data);

    }


    public function ProductTagWise($tags){
        //$producttag = Product::where('status',1)->where('product_tag',$tags)->orderBy('id','DESC')->get();
        $producttag = Product::where('status',1)->where('product_tag',$tags)->orderBy('id','DESC')->paginate(4);

        $category = Category::orderBy('category_name', 'ASC')->get();


        return view('Frontend.Tags.product_tagview',compact('producttag','category'));
    }

    public function SubCategoryWiseProduct($subcat_id, $slug){

        $subproduct = Product::where('status',1)->where('subcategory_id', $subcat_id)->orderBy('id','DESC')->paginate(4);

        $category = Category::orderBy('category_name', 'ASC')->get();


        return view('Frontend.Product.subcategory_view',compact('subproduct','category'));

    }

    public function Sub_SubCategoryWiseProduct($sub_subcat_id, $slug){

        $sub_subproduct = Product::where('status',1)->where('sub_subcategory_id', $sub_subcat_id)->orderBy('id','DESC')->paginate(4);
        $category = Category::orderBy('category_name', 'ASC')->get();

        return view('Frontend.Product.sub_subcategory_view',compact('sub_subproduct','category'));

    }
}
