<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LogRequest;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function userLogin(LogRequest $request)
    {
    $usercreds = $request->only('email', 'password');
        if (Auth::attempt($usercreds, true)) { 
            if (Auth::user()->isAdmin == 1)
            {
                $request->session()->regenerate();
                return redirect()->intended('main')->with('status','You are Signed in');;
            }else {
               
                $request->session()->regenerate();
                return redirect()->intended('main')->with('status','You are Signed in');
            }
        }
        $validator['email'] = 'Email address or password is incorrect.';
        return redirect('login')->withErrors($validator);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
