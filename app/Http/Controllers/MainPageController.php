<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
            $posts = Post::simplePaginate(4);
            $users = User::take(5)->get();
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
