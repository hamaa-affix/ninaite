<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatMessage;
use App\ChatRoom;
use App\User;
use Auth;

class ChatMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, ChatRoom $chatRoom)
    {
      //fillに置き換えができるな
      $message = new ChatMessage;
      $message->content = $request->content;
      $message->user_id = $user->id;
      $message->chat_room_id = $chatRoom->id;
      $message->body = $request->body;
      $message->save();
      
       //matcinguserの取得
      // $matchingUser = User::farms()->where('farms.id', );
      
      $chatMessages = ChatMessage::where('chat_room_id', $chatRoom->id)
                                ->whereIn('user_id', $user->id)
                                ->orderBy('created_at', 'DESC')
                                ->get();
                                
      if ($chatMessages->isEmpty()) {
        $chatMessages = 'まだメッセージはないです';
      }
      
      
      // return redirect()->route('')->compact('messages')
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
