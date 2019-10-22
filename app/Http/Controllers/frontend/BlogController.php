<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function single($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
       
        return view('frontend.single')->with('post', $post);
    }
}
