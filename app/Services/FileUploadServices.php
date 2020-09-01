<?php

namespace App\Services;

class FileUploadServices
{
  public static function fileUpload($image_file){
    //$imageFileからファイル名を取得(拡張子あり)
    $file_name_with_ext = $image_file->getClientOriginalName();
    
    //拡張子を除いたファイル名を取得
    $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
    
     //拡張子を取得
    $extension = $image_file->getClientOriginalExtension();
    // ファイル名_時間_拡張子 として設定
    $file_path = 'uplord_images/'.time().'_'.$file_name.'_'.$extension;
    //画像ファイル取得
   // $fileData = file_get_contents($imageFile->getRealPath());
    $file_data = file_get_contents($image_file);
    //配列でcontrollerにreturn
    $list = [ $file_path, $file_data];

    return $list;

  }
  
}
