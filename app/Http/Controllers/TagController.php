<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index(){
        if (Auth::user()->isAdmin == 1)
        {
            $tags = Tag::withCount('posts')->paginate(8);
            return view('pages.tag',['tags' => $tags]);
        }else 
        {   
        return redirect()->intended('categories');
        }
    }

    public function create(){
        if (Auth::user()->isAdmin == 1)
        {
            return view('pages.functions.create-tag');
        }else 
        {   
        return redirect()->intended('categories');
        }
    }

    public function store(TagRequest $request){

        Tag::create([
            'name' => $request->name
        ]);

        return redirect()->intended('tags')->with('status', 'Tag Created successfully.');
    }

    public function edit($tagId){
        $tag = Tag::findOrFail($tagId);
        return view('pages.functions.edit-tag',['tag' => $tag]);
    }
    public function update(TagRequest $request, int $tagId){
        Tag::findOrFail($tagId)->update([
            'name' => $request->name
        ]);

        return redirect()->intended('tags')->with('status', 'Tag Updated successfully.');
    }

    public function destroy($tagId){
        $tag = Tag::findOrFail($tagId);
        $tag->delete();
        return redirect('tags/')->with('status','Tag Deleted');
    }
}
