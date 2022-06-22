<?php

namespace App\Http\Controllers\Backend;
use App\Models\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function ViewAllBrands(){
        $brands = Brand::latest()->get();
        return view('Backend.Brands.allbrands',compact('brands'));
    }

    public function AddBrands(){
        return view('Backend.Brands.addnewbrands');
    }

    public function StoreBrand(Request $req){
        $req->validate([
            'brand_name'=>'required|min:4',
            'brand_image'=>'required',
        ],[
            'brand_name.required'=>'Enter a valid brand name',

        ]);

        $image = $req->file('brand_image');
        $unique_id = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(250,250)->save('upload/brand/'.$unique_id);
        $save = 'upload/brand/'.$unique_id;

        Brand::insert([
           'brand_name'=>$req->brand_name,
           'brand_slug'=>strtolower(str_replace('','-',$req->brand_name)),
           'brand_image'=>$save,
        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }

    public function EditBrand($id){
        $brand = Brand::findOrFail($id);

        return view('Backend.Brands.editbrand',compact('brand'));
    }

    public function BrandUpdate(Request $req){
        $brand_id = $req->id; //comes from the brand edit page hidden id field.
        $previous_image = $req->previous_image; //comes from the brand edit page hidden field.

        if($req->file('brand_image')){
             unlink($previous_image);
             $image = $req->file('brand_image');
             $unique_id = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(250,250)->save('upload/brand/'.$unique_id);
             $save = 'upload/brand/'.$unique_id;

             Brand::findOrFail($brand_id)->update([
                'brand_name'=>$req->brand_name,
                'brand_slug'=>strtolower(str_replace('','-',$req->brand_name)),
                'brand_image'=>$save,

             ]);

             $notification = array(
            'message'=>'Updated successful',
            'alert-type'=>'success'
             );

            return redirect()->route('all.brands')->with($notification);

        }
        else{
            Brand::findOrFail($brand_id)->update([
                'brand_name'=>$req->brand_name,
                'brand_slug'=>strtolower(str_replace('','-',$req->brand_name)),
             ]);

            $notification = array(
            'message'=>'Updated successful',
            'alert-type'=>'success'
             );

            return redirect()->route('all.brands')->with($notification);
         }

    }

    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $brand_image = $brand->brand_image;
        unlink($brand_image);

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Deleted successful',
            'alert-type'=>'warning'
             );

            return redirect()->back()->with($notification);

    }
}
