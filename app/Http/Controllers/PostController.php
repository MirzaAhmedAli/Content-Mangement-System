<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function create(){
        $categories = Categories::all();
        $subcategories = SubCategories::all();
        return view('pages.functions.create-post',[ 'categories' => $categories,'subcategories' => $subcategories]);
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
        $user->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path.$filemname,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);

        return redirect()->intended('main')->with('status', 'Posted Successfully');
    }

    public function edit(Post $post){
        return view('pages.functions.edit-post',['post' => $post]);
    }

    public function update(PostRequest $request){
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
        $user->posts()->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path.$filemname,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);

        return redirect()->intended('main')->with('status', 'Post Edited Successfully');
    }

    public function destroy($postId){
        $post = Post::findOrFail($postId);
        $post->delete();
        return redirect('main/')->with('status','Post Deleted');
    }
}
