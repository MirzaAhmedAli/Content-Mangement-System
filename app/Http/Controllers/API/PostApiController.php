<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::with('tags')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());
        $post->tags()->attach($request->tags);
        return response()->json($post->load('tags'), 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        $post->tags()->sync($request->tags);
        return response()->json($post->load('tags'), 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response(['message' => 'Post not found'], 404);
        }
    
        if ($post->user->is(auth()->user()) || auth()->user()->isAdmin == 1) {
            $post->delete();
            
            return response(['message' => 'Post deleted successfully'], 200);
        }
    
        return response(['message' => 'Unauthorized action'], 403);
    }
}
