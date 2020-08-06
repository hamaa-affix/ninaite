<?php

namespace App;

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
    public function isViewable($user_id)
    {
        return $this->chatRoomUsers()->where('user_id', $user_id)->count() > 0;
    }
}
