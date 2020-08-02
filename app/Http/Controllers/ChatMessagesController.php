<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatMessage;
use App\ChatRoom;
use App\ChatRoomUser;
use App\User;
use Auth;
use App\Events\ChatPusher;

class ChatMessagesController extends Controller
{
    
    public function index() 
    {
        $chat_room_id = ChatRoomUser::where('chat_room_users.user_id',Auth::id())->pluck('chat_room_id');
        
        $chat_messages = ChatMessage::where('chat_room_id', $chat_room_id)
                                    ->with('user')
                                    ->orderby('created_at', 'ASC')
                                    ->get();
        
        return $chat_messages;
    }
    
    
    public function store(Request $request)
    {
        
        $chat_room_id = ChatRoomUser::where('chat_room_users.user_id',Auth::id())->pluck('chat_room_id');
        
        if(is_object($chat_room_id)){
            $chat_room_id = $chat_room_id->first();
        }
        //fillに置き換えができるな
        $user = Auth::user();
        
        $chat_message = new ChatMessage;
        $chat_message->user_id = Auth::id();
        $chat_message->chat_room_id = $chat_room_id;
        $chat_message->body = $request->message;
        $chat_message->save();
        
       event(new ChatPusher($user,$chat_message));
    }
 
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    
    public function vue()
    {
      return view('index');
    }
}
