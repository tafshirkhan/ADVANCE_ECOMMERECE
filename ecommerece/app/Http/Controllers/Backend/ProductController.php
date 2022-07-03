<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Sub_SubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImage;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function AddProducts(){
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();

        return view('Backend.Product.addproduct',compact('category','brand'));

    }

    public function StoreProduct(Request $req){

         $req->validate([
            'brand_id'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'sub_subcategory_id'=>'required',
            'product_name'=>'required',
            'product_code'=>'required',
            'product_qty'=>'required',
            'product_tag'=>'required',
            'product_size'=>'required',
            'product_color'=>'required',
            'selling_price'=>'required',
            'short_desc'=>'required',
            'long_desc'=>'required',
            'product_thumb'=>'required',
            'product_thumb'=>'required',
        ]);
        
        $image = $req->file('product_thumb');
        $unique_id = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(700,700)->save('upload/product/thumbImage/'.$unique_id);
        $save = 'upload/product/thumbImage/'.$unique_id;



        $productId = Product::insertGetId([
            'brand_id'=>$req->brand_id,
            'category_id'=>$req->category_id,
            'subcategory_id'=>$req->subcategory_id,
            'sub_subcategory_id'=>$req->sub_subcategory_id,
            'product_name'=>$req->product_name,
            'product_slug'=>strtolower(str_replace('','-',$req->product_name)),
            'product_code'=>$req->product_code,
            'product_qty'=>$req->product_qty,
            'product_tag'=>$req->product_tag,
            'product_size'=>$req->product_size,
            'product_color'=>$req->product_color,
            'selling_price'=>$req->selling_price,
            'discount_price'=>$req->discount_price,
            'short_desc'=>$req->short_desc,
            'long_desc'=>$req->long_desc,

            'product_thumb'=>$save,

            'hot_deals'=>$req->hot_deals,
            'featured'=>$req->featured,
            'special_offer'=>$req->special_offer,
            'special_deals'=>$req->special_deals,
            'status'=>1,
            'created_at'=>Carbon::now(),       
        ]);

        //FOR MULTIPLE IMAGE
        $multiple_image = $req->file('multi_img');
        foreach ($multiple_image as $img) {
          $multi_unique_id = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
          Image::make($img)->resize(700,700)->save('upload/product/multiImage/'.$multi_unique_id);
          $saveImage = 'upload/product/multiImage/'.$multi_unique_id;

          MultiImage::insert([
            'product_id'=>$productId,
            'photo_name'=>$saveImage,
            'created_at'=>Carbon::now(),  

          ]);
        }

        $notification = array(
            'message'=>'Product Inserted Successfull',
            'alert-type'=>'success'
        );
        return redirect()->route('manage.product')->with($notification );
    }

    public function ManageProducts(){
        $product = Product::latest()->get();

        return view('Backend.Product.view_allproduct',compact('product'));
    }

    public function EditProducts($id){
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $sub_subcategory = Sub_SubCategory::latest()->get();
        $multiImage = MultiImage::where('product_id',$id)->get();
        $product = Product::findOrFail($id);

        return view('Backend.Product.editproduct',compact('category','subcategory','brand','sub_subcategory','product','multiImage'));
    }

    public function UpdateProduct(Request $req){
        $product_id = $req->id; //this id will come from edit product hidden field

        Product::findOrFail($product_id)->update([
            'brand_id'=>$req->brand_id,
            'category_id'=>$req->category_id,
            'subcategory_id'=>$req->subcategory_id,
            'sub_subcategory_id'=>$req->sub_subcategory_id,
            'product_name'=>$req->product_name,
            'product_slug'=>strtolower(str_replace('','-',$req->product_name)),
            'product_code'=>$req->product_code,
            'product_qty'=>$req->product_qty,
            'product_tag'=>$req->product_tag,
            'product_size'=>$req->product_size,
            'product_color'=>$req->product_color,
            'selling_price'=>$req->selling_price,
            'discount_price'=>$req->discount_price,
            'short_desc'=>$req->short_desc,
            'long_desc'=>$req->long_desc,

            'hot_deals'=>$req->hot_deals,
            'featured'=>$req->featured,
            'special_offer'=>$req->special_offer,
            'special_deals'=>$req->special_deals,
            'status'=>1,
            'created_at'=>Carbon::now(),       
        ]);

        $notification = array(
            'message'=>'Product Updated Successfull',
            'alert-type'=>'success'
        );
        return redirect()->route('manage.product')->with($notification);

    }

    public function UpdateProductMultiImage(Request $req){
        $multiImage = $req->multi_img;

        foreach($multiImage as $id => $img){
            $unlinkImage = MultiImage::findOrFail($id);
            unlink($unlinkImage->photo_name);

            
            $unique_id = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(700,700)->save('upload/product/multiImage/'.$unique_id);
            $save = 'upload/product/multiImage/'.$unique_id;

            MultiImage::where('id',$id)->update([
                'photo_name'=>$save,
                'updated_at'=>Carbon::now(),  
            ]);
        }
        $notification = array(
            'message'=>'Product Multi Image Updated Successfull',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function UpdateProductThumbImage(Request $req){
        $product_id = $req->id; //this id will come from edit product thumb hidden field
        $oldImage = $req->old_img;
        unlink($oldImage);

        $image = $req->file('product_thumb');
        $unique_id = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(700,700)->save('upload/product/thumbImage/'.$unique_id);
        $save = 'upload/product/thumbImage/'.$unique_id;

        Product::findOrFail($product_id)->update([
                'product_thumb'=>$save,
                'updated_at'=>Carbon::now(),  
            ]);

        $notification = array(
            'message'=>'Product Thumb Image Updated Successfull',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteProductMultiImage($id){
        $oldimg = MultiImage::findOrFail($id);
        unlink($oldimg->photo_name);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Product Multi Image Deleted Successfull',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);
    }
}
