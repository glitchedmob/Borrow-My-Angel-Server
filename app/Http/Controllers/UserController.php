<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login() {
        $credentials = request(['email', 'password']);
        if (!$token = auth('users_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'token' => $token,
        ]);
    }

    public function signup(Request $request)
    {
        $user = new User($request->all());
        $user->save();

        return response()->json($user);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
}
