<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Room as RoomResource;
use Chatkit;

class ChatController extends Controller
{
    public function token(Request $request)
    {
        $userId = $request->input('user_id');
        $token = Chatkit::getToken($userId);
        return response()->json($token);
    }

    public function getUsers(Request $request)
    {
        $adminId = $request->input('adminId');
        Chatkit::withUser($adminId);

        $users = Chatkit::users()->index();
        return UserResource::collection($users);
    }

    public function getUser($userId)
    {
        $user = Chatkit::withUser($userId);

        $userData = Chatkit::users()->show($userId);
        return new UserResource($userData);
    }

    public function createUser(Request $request)
    {
        $adminId = $request->input('adminId');
        Chatkit::withSudoUser($adminId);

        $userId = $request->input('userId');
        $name   = $request->input('name');
        $user = Chatkit::users()->store([
            'id' => $userId,
            'name' => $name
        ]);
        return new UserResource($user);
    }

    public function deleteUser($userId, Request $request)
    {
        $adminId = $request->input('adminId');
        Chatkit::withSudoUser($adminId);

        $deleted = Chatkit::users()->destroy($userId);
        return response()->json($deleted);
    }

    public function createRoom(Request $request)
    {
        $userId = $request->input('userId');
        Chatkit::withUser($userId);
        $room = Chatkit::rooms()->store([
            'name' => str_random(28),
            'private' => false,
            'user_ids' => [$userId]
        ]);
        return new RoomResource($room);
    }

    public function roomAddUser($roomId, $userId)
    {
        Chatkit::withUser($userId);

        $user = new \Chess\Chatkit\Models\User($userId);

        $room = $user->room($roomId)->join();
        return new RoomResource($room);
    }
}
