<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user_id = user()->id;
            $roomId  = user()->room_id;
        }else{
            $user_id = rand(100000,999999);
            $roomId  = 8001;
        }

        $room = Room::where('room_id', $roomId)->first();

        if ($room->status == 'F') {
            return 'The room closed!';
        }

        $token = md5($user_id.env('APP_KEY'));

        return view('mobile.room', compact('room', 'token', 'user_id'));
    }
}
