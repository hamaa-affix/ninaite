<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\PostBy;

class Message extends Model
{
    protected $enumCasts = [
        'post_by' => PostBy::class,
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function farm()
    {
        return $this->belongsTo('App\Farm');
    }
    
    public function isViewable($user_id) 
    {
        return $this->isConsumer() || $this->isFarmManager();
    }
    
    public function isEditable($user_id) 
    {
        return $this->isConsumerEditable() || $this->isFarmManagerEditable();
    }

    public function isConsumer($user_id) {
        return $this->user()->first.id  == $user_id;
    }    

    public function isFarmManager($user_id) {
        return $this->farm()->users()->where('users.id', $user_id)->count() > 0;
    }
    
     public function isConsumerEditable($user_id) {
        return ($this->post_by == PostBy::USER) && ($this->user()->first.id  == $user_id);
    }    

    public function isFarmManagerEditable($user_id) {
        return ($this->post_by == PostBy::FARM) && ($this->farm()->users()->where('users.id', $user_id)->count() > 0);
    }    
}
