<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\StoreRecruitment;

use App\Recruitment;
use App\Keyword;
use App\Farm;
use Auth;
use Gate;

class RecruitmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruitments = Recruitment::orderBy('id', 'desc')->get();
        
        return view('recruitments.index', compact('recruitments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($farm_id)
    {   
        $farm = Farm::find($farm_id);
        return view('recruitments.create', compact('farm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Recruitment $recruitment, StoreRecruitment $request, $farm_id)
    {
        $farm = Farm::find($farm_id);
        $recruitment->farm_id = $farm->id;
        $recruitment->fill($request->all());
        $recruitment->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($farm_id, $id)
    {
        $recruitment = Recruitment::find($id);
        
        return view('recruitments.show', compact('recruitment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $farm_id, $id)
    {
        $recruitment = Recruitment::find($id);
        
        return view('recruitments.edit', compact('recruitment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRecruitment $request, $farm_id, $id)
    {
        $recruitment = Recruitment::find($id);
        $recruitment->fill($request->all())->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($farm_id, $id)
    {
        $recruitment = Recruitment::find($id);
        $recruitment->delete();
        
        return redirect('/');
    }
}
