<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Farm;
use Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRegisterFarm;

class FarmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Farm $farm)
    {
        $farm->users();
        dd($farmData);
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
        
        //条件１、user_id = farm_idとして
         $user = Auth::user();
         $farm->id = $user->id;
         //条件２、条件２を満たした状態でinsertしていく
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
         
         
         DB::table('farm_users')->insert([
                ['user_id' => $user->id,
                 'farm_id' => $farm->id
                ],
            ]);
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
