<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LogApiController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return ['message' => 'You are logged out'];
    }

    /**
     * Update the specified resource in storage.
     */
    public function login(LogRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('webtoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
