<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Farm;
use Auth;
use Gate;
use App\Http\Requests\StoreFarmData;
use App\Recruitment;

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


    public function store(StoreFarmData $request)
    {
      $farm = new Farm;
      //fill関数に変更
      $farm->fill($request->all())->save();
      //中間テーブルへレコードを追加。
      $farm->users()->sync(Auth::user()->id);
      return redirect('/');
    }


    public function show(Farm $farm)
    {
      //user has farm_date
      $user = $farm->users()->first();
      //farm has recuitment or null
      $reccuirments = $farm->recruitments()->first();
      return view('farms.show', compact('farm', 'user','reccuirments'));
    }


    public function edit(Farm $farm)
    {
      //policyによる認可処理
      Gate::authorize('update', $farm);
      return view('farms.edit', compact('farm'));
    }


    public function update(StoreFarmData $request, Farm $farm)
    {
        //policyによる認可処理
        Gate::authorize('update', $farm);

        $farm->fill($request->all())->save();
        $user = $farm->users()->first();
        $reccuirments = $farm->recruitments()->first();

        return view('farms.show', compact('farm', 'user', 'reccuirments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        //policyによる認可処理
        Gate::authorize('delete',$farm);

        $farm->delete();
        $user = User::find(Auth::id());
        return view('users.show', compact('user'));
    }
}
