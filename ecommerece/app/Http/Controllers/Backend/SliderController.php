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
}
