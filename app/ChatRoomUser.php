<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRoomUser extends Model
{
    protected $fillable = [
       'user_id',
       'chat_room_id'
    ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function chatRoom() {
        return $this->belongsTo('App\ChatRoom');
    }
}
