<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = [
        'name', 
        'postal_code', 
        'address1',
        'address2',
        'address3',
        'tel',
        'site_url',
        'summary',
        'content'
    ];
    
    public function users()
    {
        //usersのリレーション定義変更
        return $this->belongsToMany('App\User', 'farm_user')->withTimestamps();
    }
    
    public function recruitments()
    {
        //recruitmentsへのリレーション定義変更
        return $this->hasMany('App\Recruitment');
    }
    
     public function isEditable($user_id) 
    {
        return $this->users()->where('users.id', $user_id)->count() > 0;
    }
}
