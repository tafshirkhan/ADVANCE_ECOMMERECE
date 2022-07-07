<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function AllSliders(){
        $slider = Slider::latest()->get();

        return view('Backend.Slider.allslider',compact('slider'));
    }

    public function AddSlider(){
        return view('Backend.Slider.addslider');
    }

    public function StoreSlider(Request $req){
        $req->validate([
            
            'slider_image'=>'required',
        ],[
            'slider_image.required'=>'Select a Image',

        ]);

        $image = $req->file('slider_image');
        $unique_id = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$unique_id);
        $save = 'upload/slider/'.$unique_id;

        Slider::insert([
           'title'=>$req->title,
           'desc'=>$req->desc,
           'slider_image'=>$save,
        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }

    public function EditSlider($id){
        $slider = Slider::findOrFail($id);
        return view('Backend.Slider.editslider',compact('slider'));
    }

    public function UpdateSlider(Request $req){
        $slider_id = $req->id; //this id will come from hidden field
        $old_img = $req->old_image;

        if($req->file('slider_image')){
             unlink($old_img);
             $image = $req->file('slider_image');
             $unique_id = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(870,370)->save('upload/slider/'.$unique_id);
             $save = 'upload/slider/'.$unique_id;

             Slider::findOrFail($slider_id)->update([
                'title'=>$req->title,
                'desc'=>$req->desc,
                'slider_image'=>$save,

             ]);

             $notification = array(
               'message'=>'Updated successful',
               'alert-type'=>'success'
             );

            return redirect()->route('all.sliders')->with($notification);

        }else{
            Slider::findOrFail($slider_id)->update([
                'title'=>$req->title,
                'desc'=>$req->desc,
             ]);

            $notification = array(
                'message'=>'Updated successful without image',
                'alert-type'=>'success'
             );

            return redirect()->route('all.sliders')->with($notification);
         }
    }

    public function DeleteSlider($id){

        $slider = Slider::findOrFail($id);
        $slider_image = $slider->slider_image;
        unlink($slider_image);

        Slider::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Slider deleted successful',
            'alert-type'=>'warning'

        );
        return redirect()->back()->with($notification);

    }

     public function SliderInactive($id){
         Slider::findOrFail($id)->update(['status'=> 0]);

         $notification = array(
            'message'=>'Slider Inactivated',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function SliderActive($id){
        Slider::findOrFail($id)->update(['status'=> 1]);

        $notification = array(
            'message'=>'S;ider Activated',
            'alert-type'=>'success'
        );
         return redirect()->back()->with($notification);
    }
}
