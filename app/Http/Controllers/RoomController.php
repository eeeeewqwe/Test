<?php

namespace App\Http\Controllers;


use App\Http\Requests\RoomRequest;
use App\Message;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeRoom(RoomRequest $request)
    {
        $room = new Room();
        $room->setAttribute('name', $request['name']);

        $room->save();
        return redirect('/home');
    }

    public function showRoom($id)
    {
        $room = Room::find($id);


        return view('chat.room', ['room' => $room]);
    }

    public function addUsersToRoom(Request $request)
    {
        $room = Room::where('id', $request['room_id'])->first();

        foreach($room->users as $user){
            if(Auth::user()->id === $user->id){
                return redirect()->route('roomChatForm', [$request['room_id']]);
            }
        }

        $room->users()->attach(Auth::user()->id);

        return redirect()->route('roomChatForm', [$request['room_id']]);

    }

    public function roomChat($id)
    {
        $room = Room::find($id);
        $messages = Message::where('room_id', $id)->get();

        return view('chat.chatForm', ['room' => $room, 'messages' => $messages]);
    }

    public function chat(Request $request)
    {
        $message = new Message();

        $message->setAttribute('message', $request['message']);
//        $message->setAttribute('file', $request['file']);
        $message->setAttribute('user_id', Auth::user()->id);
        $message->setAttribute('room_id', $request['room_id']);

        $message->save();

        return json_encode([
            'success' => true
        ]);

    }
}