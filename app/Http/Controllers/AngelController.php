<?php

namespace App\Http\Controllers;

use App\Angel;
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

    public function signup(Request $request)
    {
        $angel = new Angel($request->all());
        $angel->save();

        return response()->json($angel);
    }


    public function me()
    {
        return response()->json(auth()->user());
    }
}
