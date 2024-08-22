<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');   
    }

    public function store(RegisterRequest $request)
    {   
       $user =  User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);
        event(new Registered($user));
            Auth::login($user);
            return redirect('login')->withSuccess('You are Registered & Logged in!');
    }

    // public function mainpage()
    // {
    //     if(Auth::check())
    //     {
    //         return view('pages.main');
    //     }
        
    //     return redirect()->route('login')->withErrors([
    //         'email' => 'Please login to access the dashboard.',
    //     ])->onlyInput('email');
    // }
}
