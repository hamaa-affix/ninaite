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
    
    public function contactUsers(StoreFarmData $request, Farm $farm)
    {
        # $messages = Message::select('user_id', DB::raw('MAX(created_at) AS created_at'))->where('farm_id', $farm->id)->groupBy('user_id')->orderBy('MAX(created_at) DESC');

        $messagesQuery = DB::table('messages')->select(DB::raw('user_id, COUNT(*) AS posted_count, MAX(created_at) AS last_posted_at'))->where('farm_id', $farm->id)->groupBy('user_id')->toSql();
        $users = User::select()
            ->join(DB::raw("($messagesQuery) AS m"), 'users.id', '=', 'm.user_id')
            ->orderBy('m.last_posted_at', 'DESC')
            ->setBindings([$farm->id]);
        
        return view('farms.contact_users', compact('users'));
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
        return view('farms.show', compact('farmData'));
    }
}
