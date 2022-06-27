<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Sub_SubCategory;


class SubCategoryController extends Controller
{
    public function ViewAllSubCategory(){
        $category = Category::orderBy('category_name','ASC')->get();

        $subcategory = SubCategory::latest()->get();
        return view('Backend.Category.allsubcategory',compact('subcategory','category'));

    }

    public function AddSubCategory(){
        $category = Category::orderBy('category_name','ASC')->get();
        return view('Backend.Category.addsubcategory',compact('category'));
    }

    public function StoreSubCategory(Request $req){

        $req->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required|min:4',
            
        ],[
            'category_id.required'=>'Select a category first',
            'subcategory_name.required'=>'Insert a subcategory',


        ]);


        SubCategory::insert([
           'category_id'=>$req->category_id,
           'subcategory_name'=>$req->subcategory_name,
           'subcategory_slug'=>strtolower(str_replace('','-',$req->subcategory_name)),
           
        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }

    public function EditSubCategory($id){
        $category = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);

        return view('Backend.Category.editsubcategory',compact('subcategory','category'));

    }

    public function SubCategoryUpdate(Request $req){
        $subcategoryId = $req->id; // this id will come from hidden input field of the edit subcategory
        
        SubCategory::findOrFail($subcategoryId)->update([
           'category_id'=>$req->category_id,
           'subcategory_name'=>$req->subcategory_name,
           'subcategory_slug'=>strtolower(str_replace('','-',$req->subcategory_name)),
           
        ]);

        $notification = array(
            'message'=>'Updated successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Deleted successful',
            'alert-type'=>'warning'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }



    ///FOR SUB 
    public function ViewAllSub_Category(){
        $category = Category::orderBy('category_name','ASC')->get();
        $sub_subcategory = Sub_SubCategory::latest()->get();

        return view('Backend.Category.allsub_subcategory',compact('category','sub_subcategory'));
    }

    public function AddSub_SubCategory(){
        $category = Category::orderBy('category_name','ASC')->get();
        return view('Backend.Category.addsub_subcategory',compact('category'));
    }

    public function GetSubCategory($category_id){
        $subcategory = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();

        return json_encode($subcategory);

    }

    public function Sub_SubCategoryStore(Request $req){

        $req->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'sub_subcategory_name'=>'required|min:4',
            
        ],[
            'category_id.required'=>'Select a category first',
            'subcategory_id.required'=>'Select a subcategory first',
            'sub_subcategory_name.required'=>'Insert a subcategory',


        ]);


        Sub_SubCategory::insert([
           'category_id'=>$req->category_id,
           'subcategory_id'=>$req->subcategory_id,
           'sub_subcategory_name'=>$req->sub_subcategory_name,
           'sub_subcategory_slug'=>strtolower(str_replace('','-',$req->sub_subcategory_name)),
           
        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }

    public function EditSub_SubCategory($id){
        $category = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name','ASC')->get();
        $sub_subcategory = Sub_SubCategory::findOrFail($id);

        return view('Backend.Category.editsub_subcategory',compact('category','subcategory','sub_subcategory'));

    }

    public function Sub_SubCategoryUpdate(Request $req){
        $sub_subcategoryId = $req->id; // this id will come from hidden input field of the edit sub_subcategory

        Sub_SubCategory::findOrFail($sub_subcategoryId)->update([
           'category_id'=>$req->category_id,
           'subcategory_id'=>$req->subcategory_id,
           'sub_subcategory_name'=>$req->sub_subcategory_name,
           'sub_subcategory_slug'=>strtolower(str_replace('','-',$req->sub_subcategory_name)),
           
        ]);

        $notification = array(
            'message'=>'Updated successful',
            'alert-type'=>'info'
        );
        return redirect()->route('all.sub_category')->with($notification );
    }

    public function Sub_SubCategoryDelete($id){

        Sub_SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Deleted successful',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification );

    }
}
