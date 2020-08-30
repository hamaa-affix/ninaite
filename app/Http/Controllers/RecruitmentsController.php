<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRecruitment;
use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
    public function store(StoreRecruitment $request, $farm_id, Recruitment $recruitment)
    {
        //画像アップロードの処理
        if(!is_null($request->file('img_name'))) {
             //引数 $data から name='img_name'を取得(アップロードするファイル情報)
            $imageFile = $request->file('img_name');
            
            //filedataの加工
            $list = FileUploadServices::fileUpload($imageFile);
            
            //returnされた変数（配列）を各変数に配列順に代入 
            list($extension, $fileNameToStore, $fileData) = $list; 
            
            //拡張子をurlに変換
            $data_url = CheckExtensionServices::checkExtension($fileData, $extension); 
            
            //画像アップロード(Imageクラス makeメソッドを使用)
            $image = Image::make($data_url);
            
            //画像を横400px, 縦400pxにリサイズし保存
            $image->resize(700,300)->save(storage_path() . '/app/public/images/' . $fileNameToStore );
            //filename to insert
            $recruitment->img_name = $fileNameToStore;
        }
        
        
         $imagefile = $request->file('image');
        // ファイル名のタイムスタンプに使う
        $now = date_format(Carbon::now(), 'YmdHis');
        // アップロードされたファイル名を取得
        $name = $imagefile->getClientOriginalName();
        // S3の保存先のパスを生成
        $storePath="hogeimage/".$now."_".$name;
        // 画像を横幅は300px、縦幅はアスペクト比維持の自動サイズへリサイズ
        $image = Image::make($imagefile)
          ->resize(300, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        // S3に保存。ファイル名は$storePathで定義したとおり
        Storage::disk('s3') ->put($storePath, (string) $image->encode(),'public');
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
    public function update(StoreRecruitment $request, Farm $farm, Recruitment $recruitment)
    {
        //policyにによる認可
        Gate::authorize('update', $recruitment);
        
        //画像ファイル処理
       if(!is_null($request->file('img_name'))){
          $imageFile = $request->file('img_name');

          $list = FileUploadServices::fileUpload($imageFile);
          list($extension, $fileNameToStore, $fileData) = $list;
          
          $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
          $image = Image::make($data_url);        
          $image->resize(700,300)->save(storage_path() . '/app/public/images/' . $fileNameToStore );

          $recruitment->img_name = $fileNameToStore;
        }
        
        //update処理
        $recruitment->fill($request->all())->save();
        
        //関連したキーワードの中間テーブルへの更新処理
        $keywords = $request->keywords;
        $recruitment->keywords()->detach();
        $recruitment->keywords()->attach($keywords);
        
        //redirect先をrecuruitment.showへ変更すること！
        return redirect()->route('farms.recruitments.show', ['farm' => $farm->id, $recruitment->id]);
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
                     ->paginate(3);
        if (!empty($recruitments)){
            $search_result = $request->search.'の検索結果'.$recruitments->total().'件';
        } else{
            $search_result = '概要の検索結果は0件でした';
        }
        
        $keywords = Keyword::all();
        
        return view('home.index', compact('recruitments', 'keywords', 'search_result'));
    }
}
