<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $config = Config::first();
        if (Auth::check()) {
            $user_id = user()->id;
        }else{
            $user_id = rand(100000,999999);
        }
        $token = md5($user_id.env('APP_KEY'));
        return view('mobile.room', compact('config', 'token', 'user_id'));
    }
}
