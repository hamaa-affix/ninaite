<?php

namespace App\Http\Controllers;

use App\Keyword;
use App\Recruitment;
use Illuminate\Http\Request;

class KeywordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $recruitment_id)
    {
        $recruitment = Recruitment::find($recruitment_id);
        return view('keywords.create', compact('recruitment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $recruitment_id)
    {
        //正規表現の取得
        preg_match_all('/([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->value, $values);
        //空の配列を用意
        $keywordDatas = [];
        //foreachで取得した正規表現を回しながら、fistOrCreateでフィルタリングしながら保存していく。
        foreach($values[1] as $value){
            $keywordData = Keyword::firstOrCreate(['value' => $value]);
            array_push($keywordDatas, $keywordData);
        }
        //空の配列を用意して先ほど取得したデータのIDのみをforeachで回しながら代入
        $keywordDatas_id = [];
        foreach($keywordDatas as $keyword_value){
            array_push($keywordDatas_id, $keyword_value['id']);
        }
        //取得したId値を中間テーブルにレコード挿入
        $recruitment = Recruitment::find($recruitment_id);
        $recruitment->keywords()->attach($keywordDatas_id);
        
        
        return view('recruitments.show', compact('recruitment'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function show(Keyword $keyword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $recruitment = Recruitment::find($id);
      
      return view('keywords.edit', compact('recruitment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $recruitment_id)
    {
      $values = $request->value;
      foreach($values as $keyword_key => $keyword_value){
        $keyword = Keyword::find($keyword_key);
        $keyword->value = $keyword_value;
        $keyword->save();
      }
      
      $recruitment = Recruitment::find($recruitment_id);
      
      return view('recruitments.show', compact('recruitment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyword $keyword, $recruitment_id)
    {
        $recruitment = Recruitment::find($recruitment_id);
        $recruitment->keywords()->delete();
        
        return redirect('/');
    }
}
