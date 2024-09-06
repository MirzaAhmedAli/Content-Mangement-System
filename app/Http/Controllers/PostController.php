<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function create(){
        $tags = Tag::all();
        $categories = Categories::all();
        $subcategories = SubCategories::all();
        return view('pages.functions.create-post',[ 'categories' => $categories,'subcategories' => $subcategories, 'tags' => $tags]);
    }
    public function store(PostRequest $request){
        $user = auth()->user();
        $defaultImagePath = 'uploads/posts/default.jpeg';
        $filemname = null;
        $path = null;

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filemname = time().'.'.$extension;
            $path = 'uploads/posts/';
            $file->move($path,$filemname);
        }else {
            $filemname = basename($defaultImagePath);
            $path = dirname($defaultImagePath) . '/';
        }
        $post = $user->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path.$filemname,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->intended('main')->with('status', 'Posted Successfully');
    }

    public function edit(Post $post, $postId){
        //dd($post);
        $post = Post::findOrFail($postId);
        $tags = Tag::all();
        $categories = Categories::all();
        $subcategories = SubCategories::all();
        return view('pages.functions.edit-post',['categories' => $categories,'subcategories' => $subcategories, 'tags' => $tags,'post' => $post ]);
    }

    public function update(PostRequest $request,int $postId){
        $user = auth()->user();
        $defaultImagePath = 'uploads/posts/default.jpeg';
        $filemname = null;
        $path = null;

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filemname = time().'.'.$extension;
            $path = 'uploads/posts/';
            $file->move($path,$filemname);
        }else {
            $filemname = basename($defaultImagePath);
            $path = dirname($defaultImagePath) . '/';
        }

        $post = Post::findOrFail($postId);

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path.$filemname,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->intended('main')->with('status', 'Post Edited Successfully');
    }

    public function destroy($postId){
        $post = Post::findOrFail($postId);
        $post->delete();
        return redirect('main/')->with('status','Post Deleted');
    }
}
