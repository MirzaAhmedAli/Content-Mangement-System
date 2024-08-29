<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $users = User::all();
            $categories = Categories::all();
            return view('pages.main', ['users' => $users, 'categories' => $categories]);
        }
        
        return redirect()->route('login')->withErrors([
            'email' => 'Please login to access the Blog.',
        ])->onlyInput('email');
    }

    public function about(){
        return view('pages.about');
    }
}
