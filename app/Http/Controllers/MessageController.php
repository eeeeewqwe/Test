<?php

namespace App\Http\Controllers;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chatForm()
    {
        return view('chat.chatForm');
    }
}