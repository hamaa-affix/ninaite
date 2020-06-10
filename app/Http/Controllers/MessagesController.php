<?php

namespace App\Http\Controllers;

use App\Farm;
use App\User;
use App\Message;
use Auth;
use Gate;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$farm_id)
    {
        //farmidを元に紐付いているuseridを取得
        $user_id = Farm::find($farm_id)->users()->where('user_id', $farm_id)->value('user_id');

        $messages = Message::where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();
        if ($messages->isEmpty()){
            $messages = Message::select('messages')->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        }
        
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($farm_id)
    {
       $farm = Farm::find($farm_id);
       $user = Auth::user();
       
       return view('messages.create', compact('farm', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $farm_id, $user_id)
    {
        $message = new Message;
        $message->post_by = $request->post_by;
        $message->messages = $request->message;
        $message->user_id = $user_id;
        $message->farm_id = $farm_id;
        //dd($message);
        $message->save();
        
        return view('messages.index');
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
