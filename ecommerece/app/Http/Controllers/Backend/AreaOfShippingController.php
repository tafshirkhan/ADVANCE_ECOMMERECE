<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AreaOfShipping;
use App\Models\AreaOfDistrict;
use App\Models\ShippingState;
use Carbon\Carbon;

class AreaOfShippingController extends Controller
{
    public function ViewAllDivision(){
        $shippingdivision = AreaOfShipping::orderBy('id','DESC')->get();
        return view('Backend.ShippingArea.viewdivision',compact('shippingdivision'));
    }

    public function AddNewDivision(){
        return view('Backend.ShippingArea.adddivision');
    }

    public function StoreDivision(Request $req){

         $req->validate([
            'division_name'=>'required|min:4',
            
        ],[
            'divison_name.required'=>'Enter a valid name',          

        ]);

        AreaOfShipping::insert([
           'division_name'=>strtoupper($req->division_name),
           
           'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }

    public function EditDivision($id){
        $division = AreaOfShipping::findOrFail($id);

        return view('Backend.ShippingArea.editivision',compact('division'));
    }

    public function UpdateDivision(Request $req, $id){
        $req->validate([
            'division_name'=>'required|min:4',
            
        ],[
            'divison_name.required'=>'Enter a valid name',          

        ]);

        AreaOfShipping::findOrFail($id)->update([
           'division_name'=>strtoupper($req->division_name),          
           'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message'=>'Updated successful',
            'alert-type'=>'success'
        );
        return redirect()->route('all.division')->with($notification );

    }

    public function DeleteDivision($id){
        AreaOfShipping::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Deleted successful',
            'alert-type'=>'warning'
        );
        return redirect()->route('all.division')->with($notification );

    }

    ///DISTRICT//
    public function ViewAllDistrict(){
        $shippingdivision = AreaOfShipping::orderBy('division_name','DESC')->get();
        $shippingdistrict = AreaOfDistrict::with('division')->orderBy('id','DESC')->get();
        return view('Backend.ShippingArea.District.viewdistrict',compact('shippingdivision','shippingdistrict'));

    }

    public function AddNewDistrict(){
        $shippingdivision = AreaOfShipping::orderBy('id','DESC')->get();
        return view('Backend.ShippingArea.District.adddistrict',compact('shippingdivision'));

    }

    public function StoreDistrict(Request $req){

         $req->validate([
            'district_name'=>'required|min:4',
            'division_id'=>'required',
            
        ],[
            'district_name.required'=>'Enter a valid name',          

        ]);

        AreaOfDistrict::insert([
           'division_id'=>$req->division_id,
           'district_name'=>strtoupper($req->district_name),       
           'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }

    public function EditDistrict($id){
        $shippingdivision = AreaOfShipping::orderBy('id','DESC')->get();

        $district = AreaOfDistrict::findOrFail($id);
        return view('Backend.ShippingArea.District.editdistrict',compact('shippingdivision','district'));

    }

    public function UpdateDistrict(Request $req, $id){

        $req->validate([
            'district_name'=>'required|min:4',
            'division_id'=>'required',
            
        ],[
            'district_name.required'=>'Enter a valid name',          

        ]);

        AreaOfDistrict::findOrFail($id)->update([
           'division_id'=>$req->division_id,
           'district_name'=>strtoupper($req->district_name),       
           'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message'=>'Updated successful',
            'alert-type'=>'success'
        );
        return redirect()->route('all.district')->with($notification );

    }

    public function DeleteDistrict($id){
        AreaOfDistrict::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Deleted successful',
            'alert-type'=>'warning'
        );
        return redirect()->route('all.district')->with($notification );

    }

    public function ViewAllStates(){
        $shippingdivision = AreaOfShipping::orderBy('division_name','DESC')->get();
        $district = AreaOfDistrict::orderBy('district_name','DESC')->get();
        $states = ShippingState::with('division','district')->orderBy('id','DESC')->get();

        return view('Backend.ShippingArea.States.viewallstate',compact('shippingdivision','district','states'));

    }

    public function AddNewState(){
        $shippingdivision = AreaOfShipping::orderBy('id','DESC')->get();
        $district = AreaOfDistrict::orderBy('id','DESC')->get();

        return view('Backend.ShippingArea.States.addnewstate',compact('shippingdivision','district'));

    }
    
    public function StoreState(Request $req){   

         $req->validate([
            'state_name'=>'required|min:4',
            'division_id'=>'required',
            'district_id'=>'required',
            
        ],[
            'state_name.required'=>'Enter a valid name',          

        ]);

        ShippingState::insert([
           'division_id'=>$req->division_id,
           'district_id'=>$req->district_id,
           'state_name'=>strtoupper($req->state_name),       
           'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }
    
    public function EditState($id){
        $shippingdivision = AreaOfShipping::orderBy('id','DESC')->get();
        $district = AreaOfDistrict::orderBy('id','DESC')->get();
        $state = ShippingState::findOrFail($id);

        return view('Backend.ShippingArea.States.editstate',compact('shippingdivision','district','state'));
    }
    
    public function UpdateState(Request $req, $id){

        $req->validate([
            'state_name'=>'required|min:4',
            'division_id'=>'required',
            'district_id'=>'required',
            
        ],[
            'state_name.required'=>'Enter a valid name',          

        ]);

        ShippingState::findOrFail($id)->update([
           'division_id'=>$req->division_id,
           'district_id'=>$req->district_id,
           'state_name'=>strtoupper($req->state_name),       
           'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message'=>'Updated successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }
    
    public function DeleteState($id){
        ShippingState::findOrFail($id)->delete();

        $notification = array(
            'message'=>'State deleted successful',
            'alert-type'=>'warning'
        );
        return redirect()->route('all.states')->with($notification );

    }


    public function GetAllDistrict($division_id){
        $division = AreaOfDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();

        return json_encode($division);

    }
}
