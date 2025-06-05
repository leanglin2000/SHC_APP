<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
   public function index()
   {
      $categories = Category::all();
      //dd($categories);
      return view('admin.category.index', ['categories' => $categories]);
   }

   public function create()
   {
      return view('admin.category.create');
   }

   public function store(Request $request)
   {

      $validated = $request->validate([
         'name' => 'required|max:255',
      ]);

      // dd($request->all());
      $category = new Category();
      $category->name = $request->name;
      $category->save();
      return redirect()->route('admin.category.index');
   }

   public function edit($id)
   {
      $category = Category::findOrFail($id);
      //dd($category);
      return view('admin.category.edit', ['category' => $category]);
   }

   public function update(Request $request, $id)
   {

      // dd('update',$request->all());

      $validated = $request->validate([
         'name' => 'required|max:255',
      ]);

      $category = Category::findOrFail($id);
      $category->name = $request->name;
      $category->save();
      return redirect()->route('admin.category.index');
   }
   public function destroy(Request $request, $id)
   {
      //dd('destroy', $id);
      $category = Category::findOrFail($id);
      $category->delete();
      return redirect()->route('admin.category.index');
   }
}
