<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function tag(){
        return view('tag'); 
    }

    public function category(){
        return view('category'); 
   }

   public function blog(){
    return view('blog'); 
}
   
}
