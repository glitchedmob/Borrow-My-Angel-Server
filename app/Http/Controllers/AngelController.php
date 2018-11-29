<?php

namespace App\Http\Controllers;

use App\Angel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AngelController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);

        $angel = Angel::where('email', $credentials['email'])->get()[0];
        
        if (!$angel->active) {
            return response()->json(['error' => 'Not Activated!!!'], 401);
        }

        if (!$token = auth('angels_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'token' => $token,
        ]);
    }

    public function signup(Request $request)
    {
        $values = $request->all();
        $values['password'] = Hash::make($values['password']);
        $angel = new Angel($values);
        $angel->save();

        return response()->json($angel);
    }

    public function setStatus(Request $request)
    {
        $angel = Angel::find(auth()->user()->id);

        $newStatus = $request->input('status');

        $angel->status = $newStatus;
        $angel->save();

        return response()->json($angel);
    }


    public function me()
    {
        return response()->json(auth()->user());
    }
}
