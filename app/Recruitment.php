<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $fillable = [
        'status', 
        'title', 
        'summary',
        'contens',
    ];
    
    public function keywords()
    {
        //keywordsのリレーション定義変更
        return $this->belongsToMany('App\Keyword','keyword_recruitment')->withTimestamps();
    }
}
