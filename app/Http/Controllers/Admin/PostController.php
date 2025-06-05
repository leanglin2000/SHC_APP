<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', ['posts' => $posts]);
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.create', ['categories' => $categories, 'tags' => $tags]);
    }


    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $request->validate([
                'title' => 'required| max:225',
                'content' => 'required',
                'thumnail' => 'required|mimes:jpg,ipeg,png|max:2048',
                'category_id' => 'required|exists:categories,id',

            ]);

            $fileName =  time() . '_' . $request->thumnail->getClientOriginalName();
            $filePath = $request->file('thumnail')->storeAs(
                'uploads',
                $fileName,
                'public'
            );

            $post = new Post();
            $post->user_id = Auth()->id();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->thumnail = $filePath;
            $post->category_id = $request->category_id;
            $post->save();

            $post->tags()->sync($request->tags);
        });

        return redirect()->route('admin.post.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        //dd($category);
        return view('admin.post.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }


    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {

            $request->validate([
                'title' => 'required| max:225',
                'content' => 'required',
                'thumnail' => 'nullable|mimes:jpg,ipeg,png|max:2048',
                'category_id' => 'required|exists:categories,id',

            ]);

            $post = Post::findOrFail($id);
            $post->user_id = Auth()->id();
            $post->title = $request->title;
            $post->content = $request->content;

            $post->category_id = $request->category_id;

            if ($request->hasFile('thumnail')) {

                $fileName =  time() . '_' . $request->thumnail->getClientOriginalName();
                $filePath = $request->file('thumnail')->storeAs(
                    'uploads',
                    $fileName,
                    'public'

                );
                $post->thumnail = $filePath;
            };

            $post->save();

            $post->tags()->sync($request->tags);
            DB::commit();

            return redirect()->route('admin.post.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
