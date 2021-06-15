<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{

    public function chatRoomUsers()
    {
        return $this->hasMany('App\ChatRoomUser');
    }

    public function chatMessages()
    {
        return $this->hasMany('App\ChatMessage');
    }

    //chatroom閲覧に対する認可。
    public function isViewable($user, $chat_room)
    {
       $my_chat_room_id = $this->chatRoomUsers()->where('user_id', $user->id)->pluck('chat_room_id');
       if(is_object($my_chat_room_id)) {
           $my_chat_room_id = $my_chat_room_id->first();
       }

       return $my_chat_room_id == $chat_room->id;
    }
}
