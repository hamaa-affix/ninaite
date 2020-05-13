<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Farm;
use Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreFarmData;

class FarmsController extends Controller
{
    public function index()
    {
       $farmDatas = Farm::orderBy('id', 'desc')->get();
       
       return view('farms.index', compact('farmDatas'));
      
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
       $farmData = Farm::find($id);
       return view('farms.edit', compact('farmData'));
    }


    public function update(StoreFarmData $request, $id)
    {
        $farmData = Farm::find($id);
        $farmData->fill($request->all())->save();

        return view('farms.show', compact('farmData'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farmData = Auth::user()->farms()->find($id);
        $farmData->delete();
        return view('farms.show', compact('farmData'));
    }
}
