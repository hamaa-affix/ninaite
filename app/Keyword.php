<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
     protected $fillable = [
        'value', 
    ];
    
     public function recruitments()
    {
        //recruitmentsリレーション定義変更
        return $this->belongsToMany('App\Recruitment','keyword_recruitment')->withTimestamps();
    }
    
     public function isEditable($recruitment_id) 
    {
        return $this->recruitments()->where('farms.id', $recruitment_id)->count() > 0;
    }
}
