<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatMessage;
use App\ChatRoom;
use App\User;
use Auth;

class ChatMessagesController extends Controller
{
   
    
    public function store(Request $request, User $user, ChatRoom $chatRoom)
    {
      //fillに置き換えができるな
      $chat_message = new ChatMessage;
      $chat_message->content = $request->body;
      $chat_message->user_id = $user->id;
      $chat_message->chat_room_id = $chatRoom->id;
      $chat_message->body = $request->body;
      $chat_message->save();
      
       event(new ChatPusher($chat_message));
    }
    
    // public static function chat(Request $request){

    //     $chat = new ChatMessage();
    //     $chat->chat_room_id = $request->chat_room_id;
    //     $chat->user_id = $request->user_id;
    //     $chat->message = $request->message;
    //     $chat->save();

    //     event(new ChatPusher($chat));
    // }

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
}
