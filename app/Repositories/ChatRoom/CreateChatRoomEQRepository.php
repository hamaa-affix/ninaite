<?php
namespace App\Repositories\ChatRoom;
use App\User;
use App\ChatRoom;
use App\ChatRoomUser;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class CreateChatRoomEQRepository implements CreateChatRoomRepositoryInterface
{

  public static function createChatRoom()
  {
    //argument:Auth:user reration user
    //EQでcreateロジックの作成。
    //chatroomを作成するレポジトリ
    // ChatRoomUser::create(
    //   ['chat_room_id' => $chat_room_id,
    //   'user_id' => Auth::id()]);

    // ChatRoomUser::create(
    // ['chat_room_id' => $chat_room_id,
    // 'user_id' => $matching_user_id]);
  }
}
