<?php

namespace App\Http\Controllers\Admin;

use App\Models\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
   public function index()
   {
      $tags = tag::all();
      //dd($tags);
      return view('admin.tag.index', ['tags' => $tags]);
   }

   public function create()
   {
      return view('admin.tag.create');
   }

   public function store(Request $request)
   {
      // dd($request->all());
      $validated = $request->validate([
         'name' => 'required|max:255',
      ]);

      $tag = new tag();
      $tag->name = $request->name;
      $tag->save();
      return redirect()->route('admin.tag.index');
   }

   public function edit($id)
   {
      $tag = tag::findOrFail($id);
      //dd($tag);
      return view('admin.tag.edit', ['tag' => $tag]);
   }

   public function update(Request $request, $id)
   {

      // dd('update',$request->all());

      $validated = $request->validate([
         'name' => 'required|max:255',
      ]);

      $tag = tag::findOrFail($id);
      $tag->name = $request->name;
      $tag->save();
      return redirect()->route('admin.tag.index');
   }
   public function destroy(Request $request, $id)
   {
      //dd('destroy', $id);
      $tag = tag::findOrFail($id);
      $tag->delete();
      return redirect()->route('admin.tag.index');
   }
}
