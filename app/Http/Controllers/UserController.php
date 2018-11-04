<?php

namespace App\Http\Controllers;

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

    public function me()
    {
        return response()->json(auth()->user());
    }
}
