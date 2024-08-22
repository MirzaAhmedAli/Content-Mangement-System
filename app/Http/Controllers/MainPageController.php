<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return view('pages.main', );
        }
        
        return redirect()->route('login')->withErrors([
            'email' => 'Please login to access the Blog.',
        ])->onlyInput('email');
    }

    public function about(){
        return view('pages.about');
    }
}
