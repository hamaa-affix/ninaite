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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $matching_chat_room_id)
    {
        //matchingしているchatroomを取得
        $chat_room_id = ChatRoomUser::where('chat_room_id', $matching_chat_room_id)->pluck('chat_room_id');
        
        //machingしているuserのデータを取得
        $matching_user_id = ChatRoomUser::whereIn('chat_room_id', $chat_room_id)
                                          ->where('user_id', '<>', Auth::id())
                                          ->pluck('user_id');
        
        //pluckで取得した値はオブジェクト型なので数値に変換→これやらずfindで取得したら、呼び出し後プロパティ呼び出しができない。
        if(is_object($matching_user_id)){
            $matching_user_id = $matching_user_id->first();
          }
        //usernameを取得
        $matching_user_data = User::find($matching_user_id);
        $matching_user_name = $matching_user_data->name;
       
        
        //chatmessage一覧を取得
        $chat_messages = ChatMessage::where('chat_room_id', $chat_room_id)
                                      ->orderby('created_at')
                                      ->get();

        return view('chat_rooms.show', compact('chat_room_id', 'matching_user_data', 'matching_user_name', 'chat_messages'));
    }

 
    public function destroy(User $user)
    {
        //
    }
    
    public function createChatRoom(Request $request, Farm $farm, User $user) 
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

        // チャットルーム取得時はオブジェクト型なので数値に変換
        if(is_object($chat_room_id)){
                $chat_room_id = $chat_room_id->first();
          }
            
            // チャット相手のユーザー情報を取得
            $matching_user_data = User::findOrFail($matching_user_id);
        
            // チャット相手のユーザー名を取得(JS用)
            $matching_user_name = $matching_user_data->name;
        
            $chat_messages = ChatMessage::where('chat_room_id', $chat_room_id)
            ->orderby('created_at')
            ->get();
        
            return view('chat_rooms.show', compact('chat_room_id', 'matching_user_data', 'matching_user_name', 'chat_messages'));
    }
}
