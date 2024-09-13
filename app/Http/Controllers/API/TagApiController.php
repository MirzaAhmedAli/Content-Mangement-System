<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TagApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getTags()
    {
        if (auth()->user()->isAdmin == 1) {
            $query = Tag::withCount('posts');
            return DataTables::of($query)
            ->addColumn('action', function($row){
                return [
                    'edit_url' => url('tags/'.$row->id.'/edit'),
                    'delete_url' => url('tags/'.$row->id.'/delete')
                ];
            })->make(true);
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }

public function index()
{
    if (Auth::user()->isAdmin == 1)
        {
            return TagResource::collection(Tag::all());
        }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        if (Auth::user()->isAdmin == 1)
            {
            $tag = Tag::create($request->all());
            return $tag;
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $tag = Tag::find($id);
        return new TagResource($tag);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        if (Auth::user()->isAdmin == 1)
        {
            $tag = Tag::find($id);
            $tag->update($request->all());
            return $tag;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->isAdmin == 1)
        {
            return Tag::destroy($id);
        }    
    }
}
