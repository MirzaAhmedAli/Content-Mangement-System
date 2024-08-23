<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin == 1)
            {
                $users = User::all();
                return view('pages.user', ['users' => $users]);
            }else {   
                return redirect()->intended('main');
            }
    }

    public function edit(User $user){
        return view('pages.user-edit',['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += ['password' => Hash::make ($request->password)
             ];
        }
        $user->update($data);
        return redirect()->route('users.index')->with('status', 'User updated successfully.');;
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('users/')->with('status','User Deleted');
    }

    public function giveAdmin($userId)
    {
        $user = User::findOrFail($userId);
        $user->isAdmin = 1;
        $user->save();
    
        return redirect()->route('users.index')->with('status', 'User promoted to admin successfully.');
    }

}
