<?php

namespace App\Policies;

use App\ChatRoom;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatRoomPolicy
{
    use HandlesAuthorization;

   
    public function view(User $user, ChatRoom $chat_room)
    {
        return $chat_room->isViewable($user, $chat_room);
    }

}
