<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\CategoryBlog;
use App\Models\Blog\BlogPost;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
    public function BlogCategory(){
        $blogcategory = CategoryBlog::latest()->get();
        return view('Backend.Blog.BlogCategory.blogcategory_view',compact('blogcategory'));
    }

    public function AddBlogCategory(){
        return view('Backend.Blog.BlogCategory.addblogcategory');
    }

    public function StoreBlogCategory(Request $req){
         $req->validate([
            'blog_category'=>'required|min:4',
        ],[
            'blog_category.required'=>'Enter a valid name',

        ]);

        CategoryBlog::insert([
           'blog_category'=>$req->blog_category,
           'blog_category_slug'=>strtolower(str_replace('','-',$req->blog_category)),
           'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }

     public function EditBlogCategory($id){
        $blogcategory = CategoryBlog::findOrFail($id);
        return view('Backend.Blog.BlogCategory.edit_blogcategory',compact('blogcategory'));

    }

    public function UpdateBlogCategory(Request $req){
        $blogcategory_id = $req->id;

        CategoryBlog::findOrFail($blogcategory_id)->update([
                'blog_category'=>$req->blog_category,
                'blog_category_slug'=>strtolower(str_replace('','-',$req->blog_category)),
                'created_at' => Carbon::now(),

             ]);

             $notification = array(
            'message'=>'Updated successful',
            'alert-type'=>'success'
             );

            return redirect()->route('blog.category')->with($notification);
    }


    public function AddBlogPost(){
       $blogcategory = CategoryBlog::latest()->get();

       $blogpost = BlogPost::latest()->get();
       return view('Backend.Blog.Post.addblogpost_view',compact('blogpost','blogcategory'));
    }

    public function ViewAllBlogPost(){
        //$blogcategory = CategoryBlog::latest()->get();

        $blogpost = BlogPost::with('blogCategory')->latest()->get();
        return view('Backend.Blog.Post.allpostblog_list',compact('blogpost'));

    }

   public function StoreBlogPost(Request $req){
       $req->validate([
            'category_id' => 'required',
            'post_title'=>'required|min:4',
            'post_image'=>'required',
            'post_details'=>'required',
        ],[
            'post_title.required'=>'Enter a valid title',

        ]);

        $image = $req->file('post_image');
        $unique_id = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780,433)->save('upload/blogpost/'.$unique_id);
        $save = 'upload/blogpost/'.$unique_id;

        BlogPost::insert([
           'category_id'=>$req->category_id,
           'post_title'=>$req->post_title,
           'post_title_slug'=>strtolower(str_replace('','-',$req->post_title)),
           'post_image'=>$save,
           'post_details'=>$req->post_details,
           'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message'=>'Inserted successful',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

   }
}
