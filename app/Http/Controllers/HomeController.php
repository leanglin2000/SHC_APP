<?php

namespace App\Http\Controllers;


use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{
    public function index(Request $request):View{
        //$posts = Post::paginate(8); 

        $posts = Post::when($request->category_id, function ( $query, string $category_id) {
                    $query->where('category_id', $category_id);
                })
                ->when($request->search, function ( $query, string $search) {
                    $query->where('title','LIKE','%'. $search .'%');
                })
                ->when($request->tag_id,function($query,$tag_id){
                    $query->whereHas('tags',function($sub_query) use($tag_id){
                        $sub_query->where('id', $tag_id);
                    });
                })
                -> paginate(8)
                ->withQueryString();


       // $categories = Category::all();
       // $tags = Tag::all();
        return view('index',['posts' => $posts]);
        //return view('index',['posts' => $posts,'navbar_categories'=> $categories,'sidebar_tags'=> $tags]);
    }

    public function article(Request $request,$id):View{
       $posts = Post::find($id);
        return view('article',['post'=> $posts]);
    }

   
}
