<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{

    public function show($id)
    {
        $user = Auth::user()->find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = Auth::user()->find($id);
        return view('users.edit', compact('user'));
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
        $user = Auth::user()->find($id);
        $user->email = $request->email;
        $user->save();
        
        return view('users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->find($id);
        $user->delete();
        
        return redirect('/');

    }
}
