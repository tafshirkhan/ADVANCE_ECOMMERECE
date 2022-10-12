<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\CategoryBlog;
use App\Models\Blog\BlogPost;
use Carbon\Carbon;

class HomeBlogController extends Controller
{
    public function BlogView(){
      $blogpost = BlogPost::latest()->get();
      $blogcategory = CategoryBlog::latest()->get();
      return view('Frontend.Blog.allblog_list',compact('blogpost','blogcategory'));
    }

    public function PostBlogDetailsInfo($id){
      $blogpost = BlogPost::findOrFail($id);
      $blogcategory = CategoryBlog::latest()->get();
      return view('Frontend.Blog.blog_detailsinfo',compact('blogpost','blogcategory'));

    }

    public function CategorywiseAllBlog($category_id){

      $blogpost = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->get();
      $blogcategory = CategoryBlog::latest()->get();
      return view('Frontend.Blog.categorywiseallblog_list',compact('blogpost','blogcategory'));

    }
}
