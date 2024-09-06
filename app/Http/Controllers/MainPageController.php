<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $tags = Tag::all();
            $posts = Post::simplePaginate(4);
            $users = User::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get();
            $categories = Categories::all();
            $subcategories = SubCategories::all();
            return view('pages.main', ['users' => $users, 'categories' => $categories,'subcategories' => $subcategories ,'posts' => $posts]);
        }
        
        return redirect()->route('login')->withErrors([
            'email' => 'Please login to access the Blog.',
        ])->onlyInput('email');
    }

    public function about(){
        return view('pages.about');
    }
}
