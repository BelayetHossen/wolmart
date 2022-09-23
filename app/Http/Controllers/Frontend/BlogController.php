<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Post;
use App\Models\Backend\ProductCategoryGrandMother;
use App\Models\Backend\ProductTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // blog page load
    public function index()
    {
        $posts = Post::where('status', true)->where('trash', false)->get();
        $cats_1 = ProductCategoryGrandMother::where('status', true)->where('trash', false)->get();
        $tags = ProductTag::all();
        return view('frontend.pages.blogs.index',[
            'posts'         =>  $posts,
            'cats_1'         =>  $cats_1,
            'tags'         =>  $tags,
        ]);
    }

    // blog page load
    public function post($slug)
    {
        $post = Post::where('status', true)->where('slug', $slug)->first();
        $cats_1 = ProductCategoryGrandMother::where('status', true)->where('trash', false)->get();
        $tags = ProductTag::all();
        return view('frontend.pages.blogs.post',[
            'post'         =>  $post,
            'cats_1'         =>  $cats_1,
            'tags'         =>  $tags,
        ]);
    }
}
