<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
                $users = User::withCount('posts')->paginate(8);
                return view('pages.user', ['users' => $users]);
            }else {   
                return redirect()->intended('main');
            }
    }

    public function edit(User $user){
        return view('pages.user-edit',['user' => $user]);
    }

    public function show($userId, User $user){
        $posts = Post::all();
        $user = User::withCount('posts')->find($userId);
        return view('pages.profile', ['user' => $user, 'posts' => $posts]);
    }

    public function update(UserRequest $request, User $user)
    {
        $defaultImagePath = 'uploads/pfps/default.webp';
        $filemname = null;
        $path = null;

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filemname = time().'.'.$extension;
            $path = 'uploads/pfps/';
            $file->move($path,$filemname);
        }else {
            $filemname = basename($defaultImagePath);
            $path = dirname($defaultImagePath) . '/';
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'city' => $request->city,
            'country' => $request->country,
            'work' => $request->work,
            'image' => $path.$filemname
        ];

        if(!empty($request->password)){
            $data += ['password' => Hash::make ($request->password)
             ];
        }
        $user->update($data);
        return redirect()->route('users.index')->with('status', 'User updated successfully.');
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
