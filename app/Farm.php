<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    public function users()
    {
        //usersのリレーション定義変更
        return $this->belongsToMany('App\User', 'farm_user')->withTimestamps();
    }
}
