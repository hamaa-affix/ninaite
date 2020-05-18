<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $fillable = [
        'title', 
        'summary',
        'contens',
    ];
    
    public function farm()
    {   
        //farmsへのリレーション
        return $this->belongsTo('App\Farm');
    }
    
    public function keywords()
    {
        //keywordsのリレーション定義変更
        return $this->belongsToMany('App\Keyword','keyword_recruitment')->withTimestamps();
    }
    
    
}
