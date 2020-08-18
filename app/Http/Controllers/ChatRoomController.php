<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ChatRoom;
use App\ChatMessage;
use App\ChatRoomUser;
use App\Farm;
use Auth;
use Gate;
class ChatRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        // 自分の持っているチャットroomを取得
        $my_chat_room_id = ChatRoomUser::where('user_id', Auth::id())->pluck('chat_room_id');
        
        //自分と紐ついるchat_room_userの一覧を持ってくる。
        $matching_user_ids = ChatRoomUser::whereIn('chat_room_id', $my_chat_room_id)
                                      ->where('user_id', '<>', Auth::id())
                                      ->pluck('user_id');
                                      
        //matching_userの取得                     
        $matching_users = User::whereIn('id',$matching_user_ids)->orderby('created_at', 'DESC')->get();
        
        return view('chat_rooms.index', compact('matching_users'));
    }


    public function show(User $user, ChatRoom $chat_room)
    {
        // Gate::authorize('view', $user, $chat_room);
        return view('chat_rooms.show');
    }
    
    
    public function createChatRoom(Request $request, User $user) 
    {

        $matching_user_id = $request->user_id;
      
        //自分の持っているチャットルームを取得
        $current_user_chat_rooms = ChatRoomUser::where('user_id', Auth::id())
        ->pluck('chat_room_id');
    
        // 自分の持っているチャットルームからチャット相手のいるルームを探す
        $chat_room_id = ChatRoomUser::whereIn('chat_room_id', $current_user_chat_rooms)
          ->where('user_id', $matching_user_id)
            ->pluck('chat_room_id');


        // なければ作成する
        if ($chat_room_id->isEmpty()){
            //チャットルーム作成
            ChatRoom::create(); 
            //最新チャットルームを取得
            $latest_chat_room = ChatRoom::orderBy('created_at', 'desc')->first(); 
            $chat_room_id = $latest_chat_room->id;
    
            // 新規登録 モデル側 $fillableで許可したフィールドを指定して保存
              ChatRoomUser::create( 
              ['chat_room_id' => $chat_room_id,
              'user_id' => Auth::id()]);
      
              ChatRoomUser::create(
              ['chat_room_id' => $chat_room_id,
              'user_id' => $matching_user_id]);
          }
      
        
        $my_chat_room_id = ChatRoomUser::where('user_id', Auth::id())->pluck('chat_room_id');
        
        //自分と紐ついるchat_room_userの一覧を持ってくる。
        $matching_user_ids = ChatRoomUser::whereIn('chat_room_id', $my_chat_room_id)
                                      ->where('user_id', '<>', Auth::id())
                                      ->pluck('user_id');
                                      
        //matching_userの取得                     
        $matching_users = User::whereIn('id',$matching_user_ids)->orderby('created_at', 'DESC')->get();
        
        return view('chat_rooms.index', compact('matching_users'));

    }
    
    public function destroy(User $user)
    {
        //
    }
}
