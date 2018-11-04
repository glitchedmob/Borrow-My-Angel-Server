<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AngelController extends Controller
{
    public function login() {
        $credentials = request(['email', 'password']);
        if (!$token = auth('angels_api')->attempt($credentials)) {
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
