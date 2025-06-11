<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index():View{
        $posts = Post::paginate(8);
        return view('index',['posts' => $posts]);
    }

    public function article(Request $request,$id):View{
       $posts = Post::find($id);
        return view('article',['post'=> $posts]);
    }

   
}
