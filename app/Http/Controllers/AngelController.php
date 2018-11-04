<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngelController extends Controller
{
    public function login() {
        $credentials = request(['email', 'password']);
        if (!$token = auth('angels_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'token' => $token,
            'expires' => auth('angels_api')->factory()->getTTL() * 60,
        ]);
    }
}
