<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ChatRoom;
use App\ChatMessage;
use App\ChatRoomUser;
use App\Farm;
use Auth;

class ChatRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
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
      // $chatRoomData = ChatRoom::where('chatrooms.user_id', $user->id)
      //                         ->where('chatrooms.farm_id', $farm->id)
      //                         ->fist();
      
      // //コンタクトしているmessageを全件取得
      // $messages = Message::where('farms.id', $farm->id)
      //                     ->where('users.id', $user->id)
      //                     ->orderBy('created_at', 'DESC')
      //                     ->get();
      
      // // dd($messages);
      // return view('chats.show', compact('chatRoomData', 'messages'));
    }

 
    public function destroy(Farm $farm, User $user)
    {
        //
    }
    
    public function createChatRoom(Request $request, Farm $farm, User $user) 
    {
      $farm_user_id = intval($request->user_id);
      
      $matching_user_id = $farm_user_id;
    
    //自分の持っているチャットルームを取得
    $current_user_chat_rooms = ChatRoomUser::where('user_id', Auth::id())
     ->pluck('chat_room_id');

     // 自分の持っているチャットルームからチャット相手のいるルームを探す
    $chat_room_id = ChatRoomUser::whereIn('chat_room_id', $current_user_chat_rooms)
       ->where('user_id', $matching_user_id)
        ->pluck('chat_room_id');


    // なければ作成する
    if ($chat_room_id->isEmpty()){

         ChatRoom::create(); //チャットルーム作成
        
         $latest_chat_room = ChatRoom::orderBy('created_at', 'desc')->first(); //最新チャットルームを取得

         $chat_room_id = $latest_chat_room->id;

       // 新規登録 モデル側 $fillableで許可したフィールドを指定して保存
        ChatRoomUser::create( 
        ['chat_room_id' => $chat_room_id,
         'user_id' => Auth::id()]);

         ChatRoomUser::create(
         ['chat_room_id' => $chat_room_id,
         'user_id' => $matching_user_id]);
    }
    
      return redirect('/');
    }
}
