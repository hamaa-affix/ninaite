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
    public function create(Farm $farm)
    {
        return view('recruitments.create', compact('farm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecruitment $request, Farm $farm, Recruitment $recruitment)
    {
        //画像アップロードの処理
        if(!is_null($request->file('img_name'))) {
             //引数 $data から name='img_name'を取得(アップロードするファイル情報)
            $image_file = $request->file('img_name');

            //filedataの加工
            $list = FileUploadServices::fileUpload($image_file);

            //returnされた変数（配列）を各変数に配列順に代入
            list($file_path, $file_data) = $list;

            //画像アップロード(Imageクラス makeメソッドを使用) make()で画像をDGで加工する為の読み込み
            $image = Image::make($file_data);

            //画像を横700px, 縦300pxにリサイズし保存
            $image->resize(700,300,function($constraint) {
                $constraint->aspectRatio();
            });

            $disk = Storage::disk('s3');
            //path = put(1:path, 2:画像, 3:'public');
            $path_data = $disk->put($file_path, $image->encode(), 'public');
            //filename to insert S3から取得したfullpath
            $img_url = $disk->url($file_path);
        } else {
            $img_url = '/storage/recruitment_images/1.png';
        }

        $recruitment->farm_id = $farm->id;
        $recruitment->fill($request->all());
        $recruitment->img_name = $img_url;
        $recruitment->save();


        return redirect('/');

      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm, Recruitment $recruitment)
    {
        $farm_user = $farm->users()->first();
        return view('recruitments.show', compact('recruitment', 'farm', 'farm_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm, Recruitment $recruitment)
    {
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

        //画像アップロードの処理
        if(!is_null($request->file('img_name'))) {
             //引数 $data から name='img_name'を取得(アップロードするファイル情報)
            $image_file = $request->file('img_name');

            //filedataの加工
            $list = FileUploadServices::fileUpload($image_file);

            //returnされた変数（配列）を各変数に配列順に代入
            list($file_path, $file_data) = $list;

            //画像アップロード(Imageクラス makeメソッドを使用) make()で画像をDGで加工する為の読み込み
            $image = Image::make($file_data);

            //画像を横700px, 縦300pxにリサイズし保存
            $image->resize(700,300,function($constraint) {
                $constraint->aspectRatio();
            });

            $disk = Storage::disk('s3');
            //path = put(1:path, 2:画像, 3:'public');
            $path_data = $disk->put($file_path, $image->encode(), 'public');
            //filename to insert S3から取得したfullpath
            $img_url = $disk->url($file_path);
        } else {
            $img_url = $recruitment->img_name;
        }

        //update処理
        $recruitment->fill($request->all());
        $recruitment->img_name = $img_url;
        $recruitment->save();

        //関連したキーワードの中間テーブルへの更新処理
        $keywords = $request->keywords;
        $recruitment->keywords()->detach();
        $recruitment->keywords()->attach($keywords);

        return redirect()->route('farms.recruitments.show', ['farm' => $farm->id, $recruitment->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm, Recruitment $recruitment)
    {
        //policyにによる認可
        Gate::authorize('delete', $recruitment);

        $recruitment->delete();

        return redirect('/');
    }

    public function search(Request $request)
    {
			clock($request);
        $recruitments = Recruitment::where('summary','like', '%'.$request->search.'%')
											->orWhere('recruitments.content', 'like', '%'.$request->search.'%')
											->orWhere('recruitments.title', 'like', '%'.$request->search.'%')
											->get();
                    //  ->paginate(3);
        // if (!empty($recruitments)){
        //     $search_result = $request->search.'の検索結果'.$recruitments->total().'件';
        // } else{
        //     $search_result = '概要の検索結果は0件でした';
        // }

        // $keywords = Keyword::all();

        // return view('home.index', compact('recruitments', 'keywords', 'search_result'));
        return $recruitments;
    }
}
