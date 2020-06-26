<?php

namespace App\Http\Controllers;

use App\Farm;
use App\User;
use App\Message;
use App\ChatRoom;
use Auth;
use Gate;
use App\Enums\PostBy;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Farm $farm, User $user)
    {
        $messages = $farm->messages()->where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

        return view('contacts.index', compact('messages', 'farm', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Farm $farm, User $user)
    {
         return view('contacts.create', compact('farm', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Farm $farm, User $user)
    {
        $message = new Message;
        $message->post_by = PostBy::FARM;
        $message->content = $request->content;
        $message->user_id = $user->id;
        $message->farm_id = $farm->id;
        //dd($message);
        $message->save();
        
        //return redirect('messages.index', $farm_id);
        return redirect()->route('farms.users.messages.index', [$farm->id, $user->id]);
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
    public function edit(Farm $farm, User $user, Message $message)
    {
        return view('contacts.edit', compact('farm', 'user', 'message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm, User $user, Message $message)
    {
        $message->content = $request->content;
        $message->save();
        
        return redirect()->route('farms.users.messages.index', [$farm->id, $user->id]);
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
