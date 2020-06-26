<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }
    
    public function farms()
    {
        return $this->hasMany('App\Farm');
    }
    
    public function chatMessages()
    {
        return $this->hasMany('App\ChatMessage');
    }
}
