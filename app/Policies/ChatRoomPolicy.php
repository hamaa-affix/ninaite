<?php

namespace App\Policies;

use App\ChatRoom;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatRoomPolicy
{
    use HandlesAuthorization;

   
    public function view(User $user, ChatRoom $chatRoom)
    {
        return $chatRoom->isViewable();
    }

}
