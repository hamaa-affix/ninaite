<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function edit($farm_id, $id)
    {
        $recruitment = Recruitment::find($id);
        //policyにによる認可
        Gate::authorize('update', $recruitment);
        
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
        //policyにによる認可
        Gate::authorize('update', $recruitment);
        $recruitment->fill($request->all())->save();
        
        //関連したキーワードの中間テーブルへの更新処理
        $keywords = $request->keywords;
        $recruitment->keywords()->detach();
        $recruitment->keywords()->attach($keywords);
        
        //redirect先をrecuruitment.showへ変更すること！
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
        //policyにによる認可
        Gate::authorize('delete', $recruitment);
        
        $recruitment->delete();
        
        return redirect('/');
    }
    
    public function search(Request $request)
    {
        
        $recruitments = Recruitment::where('summary','like', '%'.$request->search.'%')
                     ->orWhere('recruitments.content', 'like', '%'.$request->search.'%')
                     ->paginate(1);
        if (!empty($recruitments)){
            $search_result = $request->search.'の検索結果'.$recruitments->total().'件';
        } else{
            $search_result = '概要の検索結果は0件でした';
        }
        
        $keywords = Keyword::all();
        
        return view('home.index', compact('recruitments', 'keywords', 'search_result'));
    }
}
