<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Farm;
use Auth;

use App\Http\Requests\StoreRegisterFarm;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Farm $farm)
    {
         $farm->name = $request->name;
         $farm->postal_code = $request->postal_code;
         $farm->address1 = $request->address1;
         $farm->address2 = $request->address2;
         $farm->address3 = $request->address3;
         $farm->tel = $request->tel;
         $farm->site_uri = $request->site_uri;
         $farm->summary = $request->summary;
         $farm->content = $request->content;
         $farm->save();
         
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $farmDatas = Auth::user($id)->farms()->get();
       return view('farms.show', compact('farmDatas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm, $id)
    {
       $farmData = $farm->find($id);
       return view('farms.edit', compact('farmData'));
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
        //$validated = $request->validated();
        $farmData = Farm::find($id);
        $farmData->name = $request->name;
        $farmData->postal_code = $request->postal_code;
        $farmData->address1 = $request->address1;
        $farmData->address2 = $request->address2;
        $farmData->address3 = $request->address3;
        $farmData->tel = $request->tel;
        $farmData->site_uri = $request->site_uri;
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
