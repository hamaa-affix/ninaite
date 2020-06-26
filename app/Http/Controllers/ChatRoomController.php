<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Farm;
use App\ChatRoom;
use App\Message;
use Auth;

class ChatRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Farm $farm, User $user)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm, User $user)
    {
      //chatroomを探し出す
      $chatRoomData = ChatRoom::where('chatrooms.user_id', $user->id)
                              ->where('chatrooms.farm_id', $farm->id)
                              ->fist();
      
      //コンタクトしているmessageを全件取得
      $messages = Message::where('farms.id', $farm->id)
                          ->where('users.id', $user->id)
                          ->orderBy('created_at', 'DESC')
                          ->get();
      
      // dd($messages);
      return view('chats.show', compact('chatRoomData', 'messages'));
    }

 
    public function destroy(Farm $farm, User $user)
    {
        //
    }
    
    public function createChatRoom(Farm $farm, User $user) 
    {
      $chatRoomData = new ChatRoom;
      $chatRoomData->user_id = $user->id;
      $chatRoomData->farm_id = $farm->id;
      $chatRoomData->save();
      
      $messages = Message::where('farm_id', $farm->id)
                          ->where('user_id', $user->id)
                          ->orderBy('created_at', 'DESC')
                          ->get();
                          
      if ($messages->isEmpty()) {
         $messages = 'まだメッセージのやりとりをしてません';
      }
      
      dd($messages);
      return view('chat_rooms.show', compact('createCatRoom', 'messages'));
      
    }
}
