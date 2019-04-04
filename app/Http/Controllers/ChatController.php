<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $config = Config::first();
        return view('mobile.room', compact('config'));
    }
}
