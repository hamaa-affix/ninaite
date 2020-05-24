<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;


class Recruitment extends Model
{
    protected $fillable = [
        'title', 
        'summary',
        'content',
        'status'
    ];
    
     protected $enumCasts = [
        'status' => Status::class,
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
