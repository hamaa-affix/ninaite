<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function chatRoom()
    {
        return $this->belongsTo('App\ChatRoom');
    }
}
