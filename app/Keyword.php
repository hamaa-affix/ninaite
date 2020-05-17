<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
     public function recruitments()
    {
        //recruitmentsリレーション定義変更
        return $this->belongsToMany('App\Recruitment','keyword_recruitment')->withTimestamps();
    }
}
