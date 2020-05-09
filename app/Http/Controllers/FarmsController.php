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
      //
    }

    public function create()
    {
        $user = Auth::user();
        
        return view('farms.create', compact('user'));
    }

    
    public function store(StoreFarmData $request, Farm $farm)
    {
         $farm->name = $request->name;
         $farm->postal_code = $request->postal_code;
         $farm->address1 = $request->address1;
         $farm->address2 = $request->address2;
         $farm->address3 = $request->address3;
         $farm->tel = $request->tel;
         $farm->site_url = $request->site_url;
         $farm->summary = $request->summary;
         $farm->content = $request->content;
         $farm->save();
         
         //中間テーブルへレコードを追加。
         $farm->users()->sync(Auth::user()->id);
         return redirect('/');
    }

 
    public function show($id)
    {
       $farmDatas = Auth::user($id)->farms()->get();
       return view('farms.show', compact('farmDatas'));
    }

    
    public function edit(Farm $farm, $id)
    {
       $farmData = $farm->find($id);
       return view('farms.edit', compact('farmData'));
    }


    public function update(StoreFarmData $request, $id)
    {
        $farmData = Farm::find($id);
        $farmData->name = $request->name;
        $farmData->postal_code = $request->postal_code;
        $farmData->address1 = $request->address1;
        $farmData->address2 = $request->address2;
        $farmData->address3 = $request->address3;
        $farmData->tel = $request->tel;
        $farmData->site_url = $request->site_url;
        $farmData->summary = $request->summary;
        $farmData->content = $request->content;
        $farmData->save();
        
        
        //userと紐ずくfarmdatasを取得
        $farmDatas = Auth::user()->farms()->get();
        return view('farms.show', compact('farmDatas'));
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
        
        $farmDatas = Auth::user()->farms()->get();
        return view('farms.show', compact('farmDatas'));
    }
}
