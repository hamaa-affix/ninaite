<?php

namespace App\Http\Controllers;

use App\Farm;
use App\User;
use App\Message;
use Auth;
use Gate;
use App\Enums\PostBy;
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
        $farm = Farm::find($farm_id);
        $messages = $farm->messages()->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();

        return view('messages.index', compact('messages', 'farm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($farm_id)
    {
         $farm = Farm::find($farm_id);
         
         return view('messages.create', compact('farm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $farm_id)
    {
        $message = new Message;
        $message->post_by = PostBy::USER;
        $message->content = $request->content;
        $message->user_id = Auth::id();
        $message->farm_id = $farm_id;
        //dd($message);
        $message->save();
    
        //return redirect('messages.index', $farm_id);
        return redirect()->route('farms.messages.index', $farm_id);
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
    public function edit($farm_id, $message_id)
    {
        $farm = Farm::find($farm_id);
        $message = Message::find($message_id);

        return view('messages.edit', compact('farm', 'message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $farm_id, $message_id)
    {
        $message = Message::find($message_id);
        $message->content = $request->content;
        $message->save();
        
        return redirect()->route('farms.messages.index', $message->farm_id);
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
