<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register',);   
    }

    public function store(RegisterRequest $request)
    {   
       $user =  User::create([
        'name' => $request->name,
        'email' => $request->email,
        'country' => $request->country,
        'password' => Hash::make($request->password)
    ]);
    Mail::to($user->email)->send(new RegisterEmail($user));

        event(new Registered($user));
            Auth::login($user);
            return redirect('main')->with('status','You are Registered & Logged in!');
    }   
}
