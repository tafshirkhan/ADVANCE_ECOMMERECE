<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function ViewAllCategory(){
        $category = Category::latest()->get();
        return view('Backend.Category.allcategory',compact('category'));
    }

    public function AddCategory(){
        return view('Backend.Category.addcategory');
    }

    public function StoreCategory(Request $req){
         $req->validate([
            'category_name'=>'required|min:4',
            'category_icon'=>'required',
        ],[
            'category_name.required'=>'Enter a valid name',

        ]);


        Category::insert([
           'category_name'=>$req->category_name,
           'category_slug'=>strtolower(str_replace('','-',$req->category_name)),
           'category_icon'=>$req->category_icon,
        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }

    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('Backend.Category.editcategory',compact('category'));

    }

    public function CategoryUpdate(Request $req){
        $category_id = $req->id;

        Category::findOrFail($category_id)->update([
                'category_name'=>$req->category_name,
                'category_slug'=>strtolower(str_replace('','-',$req->category_name)),
                'category_icon'=>$req->category_icon,

             ]);

             $notification = array(
            'message'=>'Updated successful',
            'alert-type'=>'success'
             );

            return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message'=>'Deleted successful',
            'alert-type'=>'warning'
        );

            return redirect()->back()->with($notification);
    }
}
