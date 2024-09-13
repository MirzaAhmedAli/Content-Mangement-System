<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->isAdmin == 1)
            {
             return UserResource::collection(User::all());
            } 
    }

    public function getUsers()
    {
        if (auth()->user()->isAdmin == 1) {
            $query = User::withCount('posts');
            return DataTables::of($query)
            ->addColumn('action', function($row){
                return [
                    'edit_url' => url('users/'.$row->id.'/edit'),
                    'delete_url' => url('users/'.$row->id.'/delete'),
                    'make_admin' => url('users/'.$row->id.'/make-admin'),
                    'is_admin' => $row->isAdmin == 1
                ];
            })->make(true);
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->isAdmin == 1)
            {
            return User::destroy($id);
            }
    }
}
