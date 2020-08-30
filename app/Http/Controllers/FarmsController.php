<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Farm;
use App\Message;
use Auth;
use Gate;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreFarmData;

class FarmsController extends Controller
{
    
    
    public function index()
    {
        
        $farmDatas = Farm::orderBy('id', 'desc')->get();
        return view('farms.index', compact('farmDatas'));
      
    }
    
    public function contactUsers(Farm $farm)
    {
       $users = User::select()->whereIn('id', $farm->messages()->pluck('user_id')->toArray())->get();
        
        return view('farms.contact_users', compact('users', 'farm'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('farms.create', compact('user'));
    }

        
    public function store(StoreFarmData $request, Farm $farm)
    {
         //fill関数に変更
         $farm->fill($request->all())->save();
         //中間テーブルへレコードを追加。
         $farm->users()->sync(Auth::user()->id);
         return redirect('/');
    }

 
    public function show($id)
    {
        $farmData = Farm::find($id);

        return view('farms.show', compact('farmData'));
    }

    
    public function edit($id)
    {
        //policyによる認可処理
        $farmData = Farm::find($id);
        Gate::authorize('update', $farmData);
        
        return view('farms.edit', compact('farmData'));
    }


    public function update(StoreFarmData $request, $id)
    {
        //policyによる認可処理
        $farmData = Farm::find($id);
        Gate::authorize('update', $farmData);

        $farmData->fill($request->all())->save();

        return view('farms.show', compact('farmData',$farmData));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //policyによる認可処理
        $farmData = Farm::find($id);
        Gate::authorize('delete',$farmData);
        
        $farmData->delete();
        $user = User::find(Auth::id());
        return view('users.show', compact('user'));
    }
}
