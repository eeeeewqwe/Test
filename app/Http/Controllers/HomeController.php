<?php

namespace App\Http\Controllers;

use App\Message;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $users = User::all()->except(Auth::id());
        $messages = Message::where('room_id', null)->get();

        return view('home', ['messages' => $messages, 'users' => $users, 'rooms' => $rooms]);
    }

    public function send(Request $request)
    {
        $message = new Message();
        $message->setAttribute('message', $request['message']);
//        $message->setAttribute('file', $request['file']);
        $message->setAttribute('user_id', Auth::user()->id);

        $message->save();

        return json_encode([
            'success' => true
        ]);
    }
}
