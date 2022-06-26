<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;


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
}
